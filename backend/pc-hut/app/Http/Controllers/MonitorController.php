<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MonitorController extends Controller
{
    public function getAll()
    {
        $monitors = Monitor::all();

        if ($monitors->count() > 0) {
            $data = [
                'status' => 200,
                'monitors' => $monitors
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'monitors' => "No response"],
                404
            );
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'size' => 'required|integer',
            'refresh_rate' => 'required|integer',
            'curved' => 'required|boolean',
            'price' => 'required|boolean',
            'manufacturer_id' => 'required|integer',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $monitor = Monitor::create([
                'model' => $request->model,
                'size' => $request->size,
                'refresh_rate' => $request->refresh_rate,
                'curved' => $request->curved,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,

            ]);

            if ($monitor) {
                return response()->json(['message' => 'monitor created successfully'], 200);
            } else {
                return response()->json(['message' => 'monitor not created!'], 500);
            }
        }
    }

    public function getById($id)
    {
        $monitor = Monitor::find($id);
        if ($monitor) {
            return response()->json([$monitor], 200);
        } else {
            return response()->json(['message' => 'monitor not found!'], 500);
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
            $monitor = Monitor::find($id);


            if ($monitor) {
                $monitor->update([
                    'model' => $request->model,
                    'size' => $request->size,
                    'refresh_rate' => $request->refresh_rate,
                    'curved' => $request->curved,
                    'price' => $request->price,
                    'manufacturer_id' => $request->manufacturer_id,

                ]);
                return response()->json(['message' => 'monitor updated successfully'], 200);
            } else {
                return response()->json(['message' => 'monitor not updated!'], 404);
            }
        }
    }

    public function delete($id)
    {
        $monitor = Monitor::find($id);

        if ($monitor) {
            $monitor->delete();
        } else {
            return response()->json(['message' => 'monitor not found!'], 404);
        }
    }
}
