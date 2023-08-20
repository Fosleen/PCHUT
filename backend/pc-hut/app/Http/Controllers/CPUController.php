<?php

namespace App\Http\Controllers;

use App\Models\CPU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CPUController extends Controller
{
    public function getAll()
    {
        $CPUs = CPU::all();

        if ($CPUs->count() > 0) {
            $data = [
                'status' => 200,
                'CPUs' => $CPUs
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'CPUs' => "No response"],
                404
            );
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'cores' => 'required|integer',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
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
            $cpu = CPU::create([
                'model' => $request->model,
                'cores' => $request->cores,
                'price' => $request->price,
                'speed' => $request->speed,
                'manufacturer_id' => $request->manufacturer_id,
                'socket_id' => $request->socket_id,
                'description' => $request->description
            ]);

            if ($cpu) {
                return response()->json(['message' => 'cpu created successfully'], 200);
            } else {
                return response()->json(['message' => 'cpu not created!'], 500);
            }
        }
    }

    public function getById($id)
    {
        $cpu = CPU::find($id);
        if ($cpu) {
            return response()->json([$cpu], 200);
        } else {
            return response()->json(['message' => 'cpu not found!'], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'cores' => 'required|integer',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
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
            $cpu = CPU::find($id);


            if ($cpu) {
                $cpu->update([
                    'model' => $request->model,
                    'cores' => $request->cores,
                    'price' => $request->price,
                    'speed' => $request->speed,
                    'manufacturer_id' => $request->manufacturer_id,
                    'socket_id' => $request->socket_id,
                    'description' => $request->description
                ]);
                return response()->json(['message' => 'cpu updated successfully'], 200);
            } else {
                return response()->json(['message' => 'cpu not updated!'], 404);
            }
        }
    }

    public function delete($id)
    {
        $cpu = CPU::find($id);

        if ($cpu) {
            $cpu->delete();
        } else {
            return response()->json(['message' => 'cpu not found!'], 404);
        }
    }
}
