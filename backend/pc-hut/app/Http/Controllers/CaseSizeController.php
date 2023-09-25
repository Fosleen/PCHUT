<?php

namespace App\Http\Controllers;

use App\Models\CaseSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaseSizeController extends Controller
{
    public function index()
    {
        $case_sizes = CaseSize::all();

        if ($case_sizes->count() > 0) {
            $data = [
                'status' => 200,
                'case_sizes' => $case_sizes
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(
                ['status' => 404, 'case_sizes' => "No response"],
                404
            ); //same format as above

        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $case_size = CaseSize::create([
                'name' => $request->name,
            ]);

            if ($case_size) {
                return response()->json(['message' => 'case_size created successfully'], 200);
            } else {
                return response()->json(['message' => 'case_size not created!'], 500);
            }
        }
    }
}
