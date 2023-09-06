<?php

namespace App\Http\Controllers;

use App\Http\Resources\PCCaseResource;
use App\Models\PcCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;

class PcCaseController extends Controller
{
    public function index()
    {
        $pccases = PcCase::with('component')->get();
        $formattedpccases = PCCaseResource::collection($pccases);

        return response()->json([
            'status' => 200,
            'pccases' => $formattedpccases,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $pccase = new PcCase([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'case_size_id' => $request->case_size_id
            ]);

            $pccase->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $pccase->id,
                'productable_type' => pccase::class,
                'product_type_cro' => "Kučište",
            ]);

            $pccase->component()->save($component);

            if ($pccase) {
                return response()->json(['message' => 'pccase created successfully'], 200);
            } else {
                return response()->json(['message' => 'pccase not created!'], 500);
            }
        }
    }
}
