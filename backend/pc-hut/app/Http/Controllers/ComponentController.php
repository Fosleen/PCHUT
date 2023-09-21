<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComponentResource;
use App\Models\Component;
use App\Models\Cooling;
use App\Models\CoolingType;
use App\Models\CPU;
use App\Models\Keyboard;
use App\Models\Manufacturer;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\RamType;
use App\Models\Socket;
use App\Models\Storage;
use App\Models\StorageType;
use App\Models\SwitchType;
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

            if ($request->has('rgb')) {
                $rgb = $request->input('rgb');
                $rgbArray = explode(',', $rgb);
                if ($request->input('product_type') == "mouse") {
                    $productIdsArray = Mouse::whereIn('rgb', $rgbArray)->pluck('id')->toArray();
                } else if ($request->input('product_type') == "keyboard") {
                    $productIdsArray = Keyboard::whereIn('rgb', $rgbArray)->pluck('id')->toArray();
                }
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('con')) {
                $connector = $request->input('con');
                $connectorArray = explode(',', $connector);
                $productIdsArray = Keyboard::whereIn('wired', $connectorArray)->pluck('id')->toArray();
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('size')) {
                $connector = $request->input('size');
                $connectorArray = explode(',', $connector);
                if ($request->input('product_type') == "monitor") {
                    $productIdsArray = Monitor::whereIn('size', $connectorArray)->pluck('id')->toArray();
                }
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('sw_ty')) {
                $switchType = $request->input('sw_ty');
                $switchTypeArray = explode(',', $switchType);
                $switchIds = SwitchType::whereIn('name', $switchTypeArray)->pluck('id')->toArray();
                $productIdsArray = Keyboard::whereIn('switch_type_id', $switchIds)->pluck('id')->toArray();
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('so_ty')) {
                $socketType = $request->input('so_ty');
                $socketTypeArray = explode(',', $socketType);
                $switchIds = Socket::whereIn('name', $socketTypeArray)->pluck('id')->toArray();
                $productIdsArray = Motherboard::whereIn('socket_id', $switchIds)->pluck('id')->toArray();
                $query->whereIn('productable_id', $productIdsArray);
            }

            if ($request->has('type')) {
                $types = $request->input('type');
                $typesArray = explode(',', $types);

                if ($request->input('product_type') == "keyboard") {
                    $productIdsArray = Keyboard::whereIn('type', $typesArray)->pluck('id')->toArray();
                } else if ($request->input('product_type') == "mouse") {
                    $productIdsArray = Mouse::whereIn('wired', $typesArray)->pluck('id')->toArray();
                } else if ($request->input('product_type') == "monitor") {
                    $productIdsArray = Monitor::whereIn('curved', $typesArray)->pluck('id')->toArray();
                } else if ($request->input('product_type') == "cooling") {
                    $coolingIds = CoolingType::whereIn('name', $typesArray)->pluck('id')->toArray();
                    $productIdsArray = Cooling::whereIn('cooling_type_id', $coolingIds)->pluck('id')->toArray();
                } else if ($request->input('product_type') == "storage") {
                    $coolingIds = StorageType::whereIn('name', $typesArray)->pluck('id')->toArray();
                    $productIdsArray = Storage::whereIn('storage_type_id', $coolingIds)->pluck('id')->toArray();
                }

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

        if ($request->has('model')) {
            $models = $request->input('model');
            $modelsArray = explode(',', $models);
            $productIdsArray = Component::whereIn('model', $modelsArray)->pluck('id')->toArray();
            $query->whereIn('id', $productIdsArray);
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
