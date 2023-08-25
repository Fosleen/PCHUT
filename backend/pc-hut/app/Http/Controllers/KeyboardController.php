<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeyboardController extends Controller
{
    public function index()
    {
        $keyboards = Keyboard::with('component')->get();

        foreach ($keyboards as $keyboard) {
            $keyboardModel = $keyboard->model;
            $keyboardManufacturer = $keyboard->manufacturer_id;
            $componentModel = $keyboard->component->model;
            $componentPrice = $keyboard->component->price;
        }

        return response()->json([
            'status' => 200,
            'keyboards' => $keyboards,
        ], 200);
    }

    public function show($id)
    {
        $keyboard = Keyboard::with('component')->find($id);

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
            'wired' => 'required|boolean',
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
                'wired' => $request->wired,
                'type' => $request->type,
                'connector' => $request->connector,
                'description' => $request->description
            ]);

            $keyboard->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'wired' => $request->wired,
                'productable_id' => $keyboard->id,
                'productable_type' => Keyboard::class,
            ]);

            $keyboard->component()->save($component);

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
