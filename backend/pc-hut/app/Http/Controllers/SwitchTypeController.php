<?php

namespace App\Http\Controllers;

use App\Models\SwitchType;
use Illuminate\Http\Request;

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
}
