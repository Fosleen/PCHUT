<?php

namespace App\Http\Controllers;

use App\Models\Cooling_type;
use Illuminate\Http\Request;

class Cooling_type_controller extends Controller
{
    public function getAll()
    {
        $cooling_types = Cooling_type::all();

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
