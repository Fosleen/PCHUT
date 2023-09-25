<?php

namespace App\Http\Controllers;

use App\Models\CoolingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CoolingTypeController extends Controller
{
    public function index()
    {
        $cooling_types = CoolingType::all();

        if ($cooling_types->count() > 0) {
            $data = [
                'status' => 200,
                'cooling_types' => $cooling_types
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'cooling_types' => "No response"],
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
            $cooling_type = CoolingType::create([
                'name' => $request->name,
            ]);

            if ($cooling_type) {
                return response()->json(['message' => 'cooling_type created successfully'], 200);
            } else {
                return response()->json(['message' => 'cooling_type not created!'], 500);
            }
        }
    }
}
