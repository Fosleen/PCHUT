<?php

namespace App\Http\Controllers;

use App\Http\Resources\GPUResource;
use App\Models\Component;
use App\Models\GPU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GPUController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true); // Default to true for pagination

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $gpus = GPU::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $gpus = GPU::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'gpus' => GPUResource::collection($gpus),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $gpus->currentPage(),
                'last_page' => $gpus->lastPage(),
                'per_page' => $gpus->perPage(),
                'total' => $gpus->total(),
            ] : null,
        ], 200);
    }



    public function show($id)
    {
        $gpu = GPU::with('component')->find($id);

        if ($gpu) {
            return new GPUResource($gpu);
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
            'memory' => 'required|integer',
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
            $gpu = new GPU([
                'model' => $request->model,
                'memory' => $request->memory,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'discount' => $request->discount
            ]);

            $gpu->save(); // Save the GPU instance to generate an ID

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $gpu->id,
                'productable_type' => GPU::class,
                'discount' => $request->discount,
                'product_type_cro' => "Grafička kartica",
            ]);

            $gpu->component()->save($component);

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
            'memory' => 'required|integer',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
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
