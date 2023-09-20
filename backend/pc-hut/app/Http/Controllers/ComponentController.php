<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Models\Component;
use App\Models\CPU;
use App\Models\Keyboard;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(Request $request)
    {
        $components = Component::with('productable');
        $query = Component::query();
        $product_type = null;
        $manufacturer = null;

        if ($request->has('product_type')) {
            $product_type = $request->input('product_type');
            $query->where('productable_type', 'App\\Models\\' . $product_type); // string concatenation

            if ($request->has('cores')) {
                $cores = $request->input('cores');
                $coresArray = explode(',', $cores);
                $productIdsArray = CPU::whereIn('cores', $coresArray)->pluck('id')->toArray();
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('type') && $request->input('product_type') == "keyboard") {
                $types = $request->input('type');
                $typesArray = explode(',', $types);
                $productIdsArray = Keyboard::whereIn('type', $typesArray)->pluck('id')->toArray();
                $query->whereIn('productable_id', $productIdsArray);
            }
        }

        if ($request->has('min')) {
            $query->where('price', '>=', $request->input('min'));
        }

        if ($request->has('max')) {
            $query->where('price', '<=', $request->input('max'));
        }

        if ($request->has('manufacturer')) {
            $manufacturer = $request->input('manufacturer');
            $manufacturerNamesArray = explode(',', $manufacturer); // "a,b' => ["a","b"]
            $manufacturerIds = Manufacturer::whereIn('name', $manufacturerNamesArray)->pluck('id')->toArray();
            $query->whereIn('manufacturer_id', $manufacturerIds);
        }

        $components = $query->get();

        if ($components->count() > 0) {
            $data = [
                'status' => 200,
                'product_type' => $product_type,
                'manufacturer' => $manufacturer,
                'components' => ComponentResource::collection($components),
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'product_type' => $product_type,
                'manufacturer' => $manufacturer,
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
