<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $components = Component::with('productable');
        $query = Component::query();
        $product_type = null;

        if ($request->has('product_type')) {
            $product_type = $request->input('product_type');
            $query->where('productable_type', 'App\\Models\\' . $product_type); // string concatenation
        }

        $components = $query->get();

        if ($components->count() > 0) {
            $data = [
                'status' => 200,
                'product_type' => $product_type,
                'components' => $components,
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'product_type' => $product_type,
                'message' => "No components",
            ], 404);
        }
    }



    public function indexDiscount()
    {
        $components = Component::whereNotNull('discount')
            ->with('productable')->with('images')
            ->get();

        if ($components->count() > 0) {
            return ComponentResource::collection($components)
                ->response()
                ->setStatusCode(200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No components"
            ], 404);
        }
    }



    public function show($id)
    {
        $component = Component::find($id);
        $component->images;
        $component->productable;
        $component->manufacturer;

        if ($component) {
            return response()->json([
                'status' => 200,
                'component' => $component,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No component found"
            ], 404);
        }
    }
}
