<?php

namespace App\Http\Controllers;

use App\Http\Resources\MonitorResource;
use App\Models\Component;
use App\Models\Monitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MonitorController extends Controller
{
    public function index()
    {
        $monitors = Monitor::with('component')->get();

        if ($monitors->count() > 0) {
            $data = [
                'status' => 200,
                'monitors' => $monitors
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'monitors' => "No monitors"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'size' => 'required|integer',
            'refresh_rate' => 'required|integer',
            'curved' => 'required|boolean',
            'price' => 'required|numeric',
            'description' => 'string',
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
                'description' => $request->description
            ]);

            $monitor->save();

            $component = Component::create([
                'model' => $request->model,
                'size' => $request->size,
                'refresh_rate' => $request->refresh_rate,
                'curved' => $request->curved,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $monitor->id,
                'productable_type' => Mouse::class,
            ]);

            $monitor->component()->save($component);

            if ($monitor) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Monitor created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Monitor not created!'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $monitor = Monitor::with('component')->find($id);
        if ($monitor) {
            return new MonitorResource($monitor);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No monitor found"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'size' => 'required|integer',
            'refresh_rate' => 'required|integer',
            'curved' => 'required|boolean',
            'price' => 'required|numeric',
            'description' => 'string',
            'manufacturer_id' => 'required|integer',
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
                    'description' => $request->description,
                    'productable_id' => $monitor->id,
                    'productable_type' => Mouse::class,
                ]);
                return response()->json(['message' => 'monitor updated successfully'], 200);
            } else {
                return response()->json(['message' => 'monitor not updated!'], 404);
            }
        }
    }

    public function destroy($id)
    {
        $monitor = Monitor::find($id);

        if ($monitor) {
            $monitor->delete();
        } else {
            return response()->json(['message' => 'monitor not found!'], 404);
        }
    }
}
