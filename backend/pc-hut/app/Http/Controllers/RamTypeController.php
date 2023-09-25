<?php

namespace App\Http\Controllers;

use App\Models\RamType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RamTypeController extends Controller
{
    public function index()
    {
        $ram_types = RamType::all();

        if ($ram_types->count() > 0) {
            $data = [
                'status' => 200,
                'ram_types' => $ram_types
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'ram_types' => "No response"],
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
            $ram_type = RamType::create([
                'name' => $request->name,
            ]);

            if ($ram_type) {
                return response()->json(['message' => 'ram_type created successfully'], 200);
            } else {
                return response()->json(['message' => 'ram_type not created!'], 500);
            }
        }
    }
}
