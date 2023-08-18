<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class Mouse_controller extends Controller
{
    public function getAll()
    {
        $mouses = Mouse::all();

        if ($mouses->count() > 0) {
            $data = [
                'status' => 200,
                'mouses' => $mouses
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'mouses' => "No response"],
                404
            );
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'dpi' => 'required|integer',
            'rgb' => 'required|boolean',
            'manufacturer_id' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $mouse = Mouse::create([
                'model' => $request->model,
                'dpi' => $request->dpi,
                'rgb' => $request->rgb,
                'manufacturer_id' => $request->manufacturer_id,

            ]);

            if ($mouse) {
                return response()->json(['message' => 'Mouse created successfully'], 200);
            } else {
                return response()->json(['message' => 'Mouse not created!'], 500);
            }
        }
    }

    public function getById($id)
    {
        $mouse = Mouse::find($id);
        if ($mouse) {
            return response()->json([$mouse], 200);
        } else {
            return response()->json(['message' => 'mouse not found!'], 500);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'sometimes|required|string',
            'dpi' => 'sometimes|required|integer',
            'rgb' => 'sometimes|required|boolean',
            'manufacturer_id' => 'sometimes|required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $mouse = Mouse::find($id);


            if ($mouse) {
                $mouse->update([
                    'model' => $request->model,
                    'dpi' => $request->dpi,
                    'rgb' => $request->rgb,
                    'manufacturer_id' => $request->manufacturer_id,

                ]);
                return response()->json(['message' => 'mouse updated successfully'], 200);
            } else {
                return response()->json(['message' => 'mouse not updated!'], 404);
            }
        }
    }

    public function delete($id)
    {
        $mouse = Mouse::find($id);

        if ($mouse) {
            $mouse->delete();
        } else {
            return response()->json(['message' => 'mouse not found!'], 404);
        }
    }
}
