<?php

namespace App\Http\Controllers;

use App\Models\Component;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index()
    {
        $components = Component::all();

        if ($components->count() > 0) {
            $data = [
                'status' => 200,
                'components' => $components,
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No components"
            ], 404);
        }
    }

    public function show($id)
    {
        $component = Component::find($id);
        $component->images;

        if ($component) {
            return response()->json([
                'status' => 200,
                'component' => $component,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No component found"
            ], 404);
        }
    }
}
