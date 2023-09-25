<?php

namespace App\Http\Controllers;

use App\Models\StorageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StorageTypeController extends Controller
{
    public function index()
    {
        $storage_types = StorageType::all();

        if ($storage_types->count() > 0) {
            $data = [
                'status' => 200,
                'storage_types' => $storage_types
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'storage_types' => "No response"],
                404
            );
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $storage_type = StorageType::create([
                'name' => $request->name,
            ]);

            if ($storage_type) {
                return response()->json(['message' => 'storage_type created successfully'], 200);
            } else {
                return response()->json(['message' => 'storage_type not created!'], 500);
            }
        }
    }
}
