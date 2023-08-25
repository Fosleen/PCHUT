<?php

namespace App\Http\Controllers;

use App\Models\CoolingType;

class CoolingTypeController extends Controller
{
    public function index()
    {
        $cooling_types = CoolingType::all();

        if ($cooling_types->count() > 0) {
            $data = [
                'status' => 200,
                'cooling_types' => $cooling_types
            ];

            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'cooling_types' => "No response"],
                404
            );
        }
    }
}
