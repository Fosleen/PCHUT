<?php

namespace App\Http\Controllers;

use App\Http\Resources\MouseResource;
use App\Models\Component;
use App\Models\Mouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MouseController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $mouses = Mouse::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $mouses = Mouse::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'mouses' => MouseResource::collection($mouses),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $mouses->currentPage(),
                'last_page' => $mouses->lastPage(),
                'per_page' => $mouses->perPage(),
                'total' => $mouses->total(),
            ] : null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'dpi' => 'required|integer',
            'rgb' => 'required|boolean',
            'price' => 'required|numeric',
            'wired' => 'required|boolean',
            'manufacturer_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $mouse = Mouse::create([
                'model' => $request->model,
                'dpi' => $request->dpi,
                'rgb' => $request->rgb,
                'price' => $request->price,
                'wired' => $request->wired,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'discount' => $request->discount
            ]);

            $mouse->save();

            $component = Component::create([
                'model' => $request->model,
                'dpi' => $request->dpi,
                'rgb' => $request->rgb,
                'price' => $request->price,
                'wired' => $request->wired,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $mouse->id,
                'productable_type' => Mouse::class,
                'discount' => $request->discount,
                'product_type_cro' => "Miš",
            ]);

            $mouse->component()->save($component);

            if ($mouse) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Mouse created successfully'
                ], 200);
            } else {
                return response()->json(['message' => 'Mouse not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $mouse = Mouse::with('component')->find($id);

        if ($mouse) {
            return new MouseResource($mouse);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No keyboard found"
            ], 404);
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
            $mouse = Mouse::find($id);

            if ($mouse) {
                $mouse->update([
                    'model' => $request->model,
                    'dpi' => $request->dpi,
                    'rgb' => $request->rgb,
                    'manufacturer_id' => $request->manufacturer_id,
                    'description' => $request->description
                ]);
                return response()->json(['message' => 'mouse updated successfully'], 200);
            } else {
                return response()->json(['message' => 'mouse not updated!'], 404);
            }
        }
    }

    public function destroy($id)
    {
        $mouse = Mouse::find($id);

        if ($mouse) {
            $mouse->delete();
        } else {
            return response()->json(['message' => 'mouse not found!'], 404);
        }
    }
}
