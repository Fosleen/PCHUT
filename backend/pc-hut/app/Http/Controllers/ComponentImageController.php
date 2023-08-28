<?php

namespace App\Http\Controllers;

use App\Models\ComponentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComponentImageController extends Controller
{
    public function index()
    {
        $images = ComponentImage::all();

        if ($images->count() > 0) {
            $data = [
                'status' => 200,
                'images' => $images
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No images"
            ], 404);
        }
    }

    public function show($id)
    {
        $image = ComponentImage::find($id);

        if ($image) {
            return response()->json([
                'status' => 200,
                'image' => $image
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No image found"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|string',
            'component_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $image = ComponentImage::create([
                'url' => $request->url,
                'component_id' => $request->component_id,
            ]);

            if ($image) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Image created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Image not created!'
                ], 500);
            }
        }
    }
}
