<?php

namespace App\Http\Controllers;

use App\Http\Resources\RAMResource;
use App\Models\RAM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;



class RAMController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $rams = RAM::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $rams = RAM::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'rams' => RAMResource::collection($rams),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $rams->currentPage(),
                'last_page' => $rams->lastPage(),
                'per_page' => $rams->perPage(),
                'total' => $rams->total(),
            ] : null,
        ], 200);
    }


    public function indexWithRamType(Request $request, $ramTypeId)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $rams = RAM::with('component')->where('ram_type_id', $ramTypeId)->paginate($perPage, ['*'], 'page', $page);
        } else {
            $rams = RAM::with('component')->where('ram_type_id', $ramTypeId)->get();
        }

        return response()->json([
            'status' => 200,
            'rams' => RAMResource::collection($rams),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $rams->currentPage(),
                'last_page' => $rams->lastPage(),
                'per_page' => $rams->perPage(),
                'total' => $rams->total(),
            ] : null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'ram_type_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $ram = new RAM([
                'model' => $request->model,
                'price' => $request->price,
                'speed' => $request->speed,
                'manufacturer_id' => $request->manufacturer_id,
                'ram_type_id' => $request->ram_type_id,
                'description' => $request->description,
                'discount' => $request->discount,
            ]);

            $ram->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $ram->id,
                'productable_type' => ram::class,
                'discount' => $request->discount,
                'product_type_cro' => "RAM memorija",
            ]);

            $ram->component()->save($component);

            if ($ram) {
                return response()->json(['message' => 'ram created successfully'], 200);
            } else {
                return response()->json(['message' => 'ram not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $ram = RAM::with('component')->find($id);

        if ($ram) {
            return new RAMResource($ram);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No ram found"
            ], 404);
        }
    }
}
