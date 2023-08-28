<?php

namespace App\Http\Controllers;

use App\Http\Resources\MotherboardResource;
use App\Models\Component;
use App\Models\Motherboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotherboardController extends Controller
{
    public function index()
    {
        $motherboards = Motherboard::with('component')->get();

        foreach ($motherboards as $motherboard) {
            $motherboardModel = $motherboard->model;
            $motherboardManufacturer = $motherboard->manufacturer_id;
            $componentModel = $motherboard->component->model;
            $componentMemory = $motherboard->component->memory;
            $componentPrice = $motherboard->component->price;
        }

        return response()->json([
            'status' => 200,
            'motherboards' => $motherboards,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'socket_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {

            $motherboard = new Motherboard([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'socket_id' => $request->socket_id,
                'description' => $request->description
            ]);

            $motherboard->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $motherboard->id,
                'productable_type' => Motherboard::class,
            ]);

            $motherboard->component()->save($component);

            if ($motherboard) {
                return response()->json(['message' => 'Motherboard created successfully'], 200);
            } else {
                return response()->json(['message' => 'Motherboard not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $motherboard = Motherboard::with('component')->find($id);
        if ($motherboard) {
            return new MotherboardResource($motherboard);
        } else {
            return response()->json(['message' => 'motherboard not found!'], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'sometimes|required|string',
            'dpi' => 'sometimes|required|integer',
            'rgb' => 'sometimes|required|boolean',
            'manufacturer_id' => 'sometimes|required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $motherboard = Motherboard::find($id);

            if ($motherboard) {
                $motherboard->update([
                    'model' => $request->model,
                    'dpi' => $request->dpi,
                    'rgb' => $request->rgb,
                    'manufacturer_id' => $request->manufacturer_id,
                    'description' => $request->description
                ]);
                return response()->json(['message' => 'motherboard updated successfully'], 200);
            } else {
                return response()->json(['message' => 'motherboard not updated!'], 404);
            }
        }
    }

    public function destroy($id)
    {
        $motherboard = Motherboard::find($id);

        if ($motherboard) {
            $motherboard->delete();
        } else {
            return response()->json(['message' => 'motherboard not found!'], 404);
        }
    }
}
