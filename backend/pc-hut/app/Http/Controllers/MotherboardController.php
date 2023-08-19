<?php

namespace App\Http\Controllers;

use App\Models\Motherboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MotherboardController extends Controller
{
    public function getAll()
    {
        $motherboards = Motherboard::all();

        if ($motherboards->count() > 0) {
            $data = [
                'status' => 200,
                'motherboards' => $motherboards
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'motherboards' => "No response"],
                404
            );
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'socket_id' => 'required|integer',


        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $motherboard = Motherboard::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'socket_id' => $request->socket_id,

            ]);

            if ($motherboard) {
                return response()->json(['message' => 'Motherboard created successfully'], 200);
            } else {
                return response()->json(['message' => 'Motherboard not created!'], 500);
            }
        }
    }

    public function getById($id)
    {
        $motherboard = Motherboard::find($id);
        if ($motherboard) {
            return response()->json([$motherboard], 200);
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

                ]);
                return response()->json(['message' => 'motherboard updated successfully'], 200);
            } else {
                return response()->json(['message' => 'motherboard not updated!'], 404);
            }
        }
    }

    public function delete($id)
    {
        $motherboard = Motherboard::find($id);

        if ($motherboard) {
            $motherboard->delete();
        } else {
            return response()->json(['message' => 'motherboard not found!'], 404);
        }
    }
}
