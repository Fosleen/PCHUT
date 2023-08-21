<?php

namespace App\Http\Controllers;

use App\Models\GPU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GPUController extends Controller
{
    public function index()
    {
        $gpus = GPU::all();

        if ($gpus->count() > 0) {
            return response()->json([
                'status' => 200,
                'gpus' => $gpus
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No gpus"
            ], 404);
        }
    }

    public function show($id)
    {
        $gpu = GPU::find($id);

        if ($gpu) {
            return response()->json([
                'status' => 200,
                'gpu' => $gpu
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No gpu found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'memory' => 'required|boolean',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'pc_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $gpu = GPU::create([
                'model' => $request->model,
                'memory' => $request->memory,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'pc_id' => $request->pc_id,
                'description' => $request->description
            ]);

            if ($gpu) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Gpu created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Gpu not created!'
                ], 500);
            }
        }
    }


    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'memory' => 'required|boolean',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'pc_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $gpu = GPU::find($id);
            if ($gpu) {
                $gpu->update([
                    'model' => $request->model,
                    'memory' => $request->memory,
                    'price' => $request->price,
                    'manufacturer_id' => $request->manufacturer_id,
                    'pc_id' => $request->pc_id,
                    'description' => $request->description
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Gpu updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No gpu found'
                ], 404);
            }
        }
    }

    public function destroy($id)
    {
        $gpu = GPU::find($id);
        if ($gpu) {
            $gpu->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Gpu successfully deleted'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No gpu found'
            ], 404);
        }
    }
}
