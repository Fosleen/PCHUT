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
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'switch_type_id' => 'required|integer',
            'type' => 'required|string',
            'connector' => 'required|string',
            'description' => 'string'
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
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'switch_type_id' => $request->switch_type_id,
                'type' => $request->type,
                'connector' => $request->connector,
                'description' => $request->description
            ]);

            if ($keyboard) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Keyboard created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Keyboard not created!'
                ], 500);
            }
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'rgb' => 'required|boolean',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'switch_type_id' => 'required|integer',
            'type' => 'required|string',
            'connector' => 'required|string',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $keyboard = Keyboard::find($id);
            if ($keyboard) {
                $keyboard->update([
                    'model' => $request->model,
                    'rgb' => $request->rgb,
                    'price' => $request->price,
                    'manufacturer_id' => $request->manufacturer_id,
                    'switch_type_id' => $request->switch_type_id,
                    'type' => $request->type,
                    'connector' => $request->connector,
                    'description' => $request->description
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Keyboard updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No keyboard found'
                ], 404);
            }
        }
    }


    public function destroy($id)
    {
        $keyboard = Keyboard::find($id);
        if ($keyboard) {
            $keyboard->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Keyboard successfully deleted'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No keyboard found'
            ], 404);
        }
    }
}
