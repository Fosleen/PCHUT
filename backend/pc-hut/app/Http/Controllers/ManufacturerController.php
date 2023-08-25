<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::all();

        if ($manufacturers->count() > 0) {
            return response()->json([
                'status' => 200,
                'manufacturers' => $manufacturers,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No manufacturers"
            ], 404);
        }
    }

    public function show($id)
    {
        $manufacturer = Manufacturer::find($id);

        if ($manufacturer) {
            return response()->json([
                'status' => 200,
                'manufacturer' => $manufacturer,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No manufacturer found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'logo_url' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $manufacturer = Manufacturer::create([
                'name' => $request->name,
                'logo_url' => $request->logo_url,
            ]);

            if ($manufacturer) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Manufacturer created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Manufacturer not created!'
                ], 500);
            }
        }
    }

    public function destroy($id)
    {
        $manufacturer = Manufacturer::find($id);
        if ($manufacturer) {
            $manufacturer->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Manufacturer successfully deleted'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No manufacturer found'
            ], 404);
        }
    }
}
