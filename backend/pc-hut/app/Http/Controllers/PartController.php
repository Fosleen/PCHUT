<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Mouse;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $keyboards = Keyboard::all();
        $mouses = Mouse::all();

        if ($mouses->count() > 0 || $keyboards->count() > 0) {
            $data = [
                'status' => 200,
                'keyboards' => $keyboards,
                'mouses' => $mouses,
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'parts' => "No response"],
                404
            );
        }
    }
}
