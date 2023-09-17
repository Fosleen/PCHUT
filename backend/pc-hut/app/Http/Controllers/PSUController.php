<?php

namespace App\Http\Controllers;

use App\Http\Resources\PSUResource;
use App\Models\PSU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;


class PSUController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $psus = PSU::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $psus = PSU::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'psus' => PSUResource::collection($psus),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $psus->currentPage(),
                'last_page' => $psus->lastPage(),
                'per_page' => $psus->perPage(),
                'total' => $psus->total(),
            ] : null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $psu = new PSU([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'power' => $request->power,
                'discount' => $request->discount
            ]);

            $psu->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $psu->id,
                'productable_type' => PSU::class,
                'discount' => $request->discount,
                'product_type_cro' => "PSU",
            ]);

            $psu->component()->save($component);

            if ($psu) {
                return response()->json(['message' => 'psu created successfully'], 200);
            } else {
                return response()->json(['message' => 'psu not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $psu = PSU::with('component')->find($id);

        if ($psu) {
            return $psu; //mby add resource later
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No psu found"
            ], 404);
        }
    }
}
