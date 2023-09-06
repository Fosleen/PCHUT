<?php

namespace App\Http\Controllers;

use App\Http\Resources\MotherboardResource;
use App\Models\Component;
use App\Models\Motherboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotherboardController extends Controller
{
    public function index(Request $request)
    {

        $paginate = $request->query('paginate', true); // Default to true for pagination

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $motherboards = Motherboard::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $motherboards = Motherboard::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'motherboards' => MotherboardResource::collection($motherboards),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $motherboards->currentPage(),
                'last_page' => $motherboards->lastPage(),
                'per_page' => $motherboards->perPage(),
                'total' => $motherboards->total(),
            ] : null,
        ], 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'socket_id' => 'required|integer',
            'ram_type_id' => 'required|integer',

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
                'description' => $request->description,
                'ram_type_id' => $request->ram_type_id,
                'discount' => $request->discount

            ]);

            $motherboard->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $motherboard->id,
                'productable_type' => Motherboard::class,
                'discount' => $request->discount
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
