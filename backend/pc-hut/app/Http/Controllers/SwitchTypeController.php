<?php

namespace App\Http\Controllers;

use App\Models\SwitchType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SwitchTypeController extends Controller
{
    public function index()
    {
        $switches = SwitchType::all();

        if ($switches->count() > 0) {
            $data = [
                'status' => 200,
                'switches' => $switches
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No switches"
            ], 404);
        }
    }

    public function show($id)
    {
        $switch = SwitchType::find($id);

        if ($switch) {
            return response()->json([
                'status' => 200,
                'switch' => $switch
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No switch found"
            ], 404);
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
            $switch_type = SwitchType::create([
                'name' => $request->name,
            ]);

            if ($switch_type) {
                return response()->json(['message' => 'switch_type created successfully'], 200);
            } else {
                return response()->json(['message' => 'switch_type not created!'], 500);
            }
        }
    }
}
