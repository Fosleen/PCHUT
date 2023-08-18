<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeyboardController extends Controller
{
    public function index()
    {
        $keyboards = Keyboard::all();

        if ($keyboards->count() > 0) {
            return response()->json([
                'status' => 200,
                'keyboards' => $keyboards
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No keyboards"
            ], 404);
        }
    }

    public function show($id)
    {
        $keyboard = Keyboard::find($id);

        if ($keyboard) {
            return response()->json([
                'status' => 200,
                'keyboard' => $keyboard
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No keyboard found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'rgb' => 'required|boolean',
            'manufacturer_id' => 'required|integer',
            'switch_type_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $keyboard = Keyboard::create([
                'model' => $request->model,
                'rgb' => $request->rgb,
                'manufacturer_id' => $request->manufacturer_id,
                'switch_type_id' => $request->switch_type_id,
            ]);

            if ($keyboard) {
                return response()->json(
                    ['message' => 'Keyboard created successfully'],
                    200
                );
            } else {
                return response()->json(
                    ['message' => 'Keyboard not created!'],
                    500
                );
            }
        }
    }
}
