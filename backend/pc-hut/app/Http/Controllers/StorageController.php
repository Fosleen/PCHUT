<?php

namespace App\Http\Controllers;

use App\Http\Resources\StorageResource;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;



class StorageController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $storages = Storage::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $storages = Storage::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'storages' => StorageResource::collection($storages),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $storages->currentPage(),
                'last_page' => $storages->lastPage(),
                'per_page' => $storages->perPage(),
                'total' => $storages->total(),
            ] : null,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'storage_type_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $storage = new Storage([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'storage_type_id' => $request->storage_type_id,
                'description' => $request->description,
                'size' => $request->size,
                'discount' => $request->discount,
                'product_type_cro' => "Memorija",
            ]);

            $storage->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $storage->id,
                'productable_type' => Storage::class,
                'discount' => $request->discount,
                'product_type_cro' => "Pohrana",

            ]);

            $storage->component()->save($component);

            if ($storage) {
                return response()->json(['message' => 'storage created successfully'], 200);
            } else {
                return response()->json(['message' => 'storage not created!'], 500);
            }
        }
    }
}
