<?php

namespace App\Http\Controllers;

use App\Http\Resources\PCCaseResource;
use App\Models\PcCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;

class PcCaseController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->query('paginate', true);

        if ($paginate === 'true') {
            $page = $request->query('page', 1);
            $perPage = 4;
            $cases = PcCase::with('component')->paginate($perPage, ['*'], 'page', $page);
        } else {
            $cases = PcCase::with('component')->get();
        }

        return response()->json([
            'status' => 200,
            'cases' => PcCaseResource::collection($cases),
            'pagination' => ($paginate === 'true') ? [
                'current_page' => $cases->currentPage(),
                'last_page' => $cases->lastPage(),
                'per_page' => $cases->perPage(),
                'total' => $cases->total(),
            ] : null,
        ], 200);
    }

    public function show($id)
    {
        $pc_case = PcCase::with('component')->find($id);

        if ($pc_case) {
            return new PCCaseResource($pc_case);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No PC case found"
            ], 404);
        }
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
                'case_size_id' => $request->case_size_id,
                'discount' => $request->discount
            ]);

            $pccase->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $pccase->id,
                'productable_type' => PcCase::class,
                'discount' => $request->discount,
                'product_type_cro' => "Kućište",
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
