<?php

namespace App\Http\Controllers;

use App\Models\Gpu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GpuController extends Controller
{
    public function index()
    {
        $gpus = Gpu::all();

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
        $gpu = Gpu::find($id);

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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $gpu = Gpu::create([
                'model' => $request->model,
                'memory' => $request->memory,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'pc_id' => $request->pc_id,
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
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $gpu = Gpu::find($id);
            if ($gpu) {
                $gpu->update([
                    'model' => $request->model,
                    'memory' => $request->memory,
                    'price' => $request->price,
                    'manufacturer_id' => $request->manufacturer_id,
                    'pc_id' => $request->pc_id,
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
        $gpu = Gpu::find($id);
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
