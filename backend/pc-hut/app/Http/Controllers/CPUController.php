<?php

namespace App\Http\Controllers;

use App\Http\Resources\CPUResource;
use App\Models\CPU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;

class CPUController extends Controller
{
    public function index()
    {
        $cpus = CPU::with('component')->get();

        foreach ($cpus as $cpu) {
            $cpuModel = $cpu->model;
            $cpuManufacturer = $cpu->manufacturer_id;
            $componentModel = $cpu->component->model;
            $componentMemory = $cpu->component->memory;
            $componentPrice = $cpu->component->price;
        }

        return response()->json([
            'status' => 200,
            'cpus' => $cpus,
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'cores' => 'required|integer',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'socket_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $cpu = new CPU([
                'model' => $request->model,
                'cores' => $request->cores,
                'price' => $request->price,
                'speed' => $request->speed,
                'manufacturer_id' => $request->manufacturer_id,
                'socket_id' => $request->socket_id,
                'description' => $request->description
            ]);

            $cpu->save();

            $component = Component::create([
                'model' => $request->model,
                'price' => $request->price,
                'manufacturer_id' => $request->manufacturer_id,
                'description' => $request->description,
                'productable_id' => $cpu->id,
                'productable_type' => CPU::class,
            ]);

            $cpu->component()->save($component);

            if ($cpu) {
                return response()->json(['message' => 'cpu created successfully'], 200);
            } else {
                return response()->json(['message' => 'cpu not created!'], 500);
            }
        }
    }

    public function show($id)
    {
        $cpu = CPU::with('component')->find($id);

        if ($cpu) {
            return new CPUResource($cpu);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No cpu found"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string',
            'cores' => 'required|integer',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'socket_id' => 'required|integer',
            'description' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $cpu = CPU::find($id);


            if ($cpu) {
                $cpu->update([
                    'model' => $request->model,
                    'cores' => $request->cores,
                    'price' => $request->price,
                    'speed' => $request->speed,
                    'manufacturer_id' => $request->manufacturer_id,
                    'socket_id' => $request->socket_id,
                    'description' => $request->description
                ]);
                return response()->json(['message' => 'cpu updated successfully'], 200);
            } else {
                return response()->json(['message' => 'cpu not updated!'], 404);
            }
        }
    }

    public function destroy($id)
    {
        $cpu = CPU::find($id);

        if ($cpu) {
            $cpu->delete();
        } else {
            return response()->json(['message' => 'cpu not found!'], 404);
        }
    }
}
