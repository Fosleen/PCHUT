<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoolingResource;
use App\Models\Component;
use App\Models\Cooling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoolingController extends Controller
{
    public function index(Request $request)
    {

        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $coolings = Cooling::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $coolings = Cooling::with('component')->get();
        }


        return response()->json([
            'status' => 200,
            'coolings' => CoolingResource::collection($coolings),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $coolings->currentPage(),
                'last_page' => $coolings->lastPage(),
                'per_page' => $coolings->perPage(),
                'total' => $coolings->total(),
            ] : null,
        ], 200);
    }

    public function show($id)
    {
        $cooling = Cooling::with('component')->find($id);

        if ($cooling) {
            return new CoolingResource($cooling);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No cooling found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'cooling_type_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $cooling = Cooling::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'cooling_type_id' => $request->cooling_type_id,
                'description' => $request->description,
                'discount' => $request->discount,
            ]);

            $cooling->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $cooling->id,
                'productable_type' => Cooling::class,
                'discount' => $request->discount,
                'product_type_cro' => "Hlađenje",
            ]);

            $cooling->component()->save($component);

            if ($cooling) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Cooling created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Cooling not created!'
                ], 500);
            }
        }
    }
}
