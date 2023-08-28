<?php

namespace App\Http\Controllers;

use App\Http\Resources\RAMResource;
use App\Models\RAM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;



class RAMController extends Controller
{
    public function index()
    {
        $rams = RAM::with('component')->get();

        return response()->json([
            'status' => 200,
            'rams' => $rams,
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
                'description' => $request->description
            ]);

            $ram->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $ram->id,
                'productable_type' => ram::class,
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
