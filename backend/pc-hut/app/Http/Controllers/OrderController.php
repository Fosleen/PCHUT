<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        foreach ($orders as $order) {
            $order->component;
        }

        if ($orders->count() > 0) {
            $data = [
                'status' => 200,
                'orders' => $orders,
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No orders"
            ], 404);
        }
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order->component;

        if ($order->count() > 0) {
            $data = [
                'status' => 200,
                'order' => $order,
            ];

            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No order"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'component_id' => 'required|array',
            'component_id.*' => 'required|integer',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $order = Order::create([
                'id' => $request->order_id,
                'user_id' => $request->user_id,
            ]);

            foreach ($request->component_id as $index => $component_id) {
                $quantity = $request->quantity[$index];
                $order->component()->attach([$component_id => ['quantity' => $quantity]]);
            }

            $order->save();

            if ($order) {
                return response()->json(['message' => 'Order created successfully'], 200);
            } else {
                return response()->json(['message' => 'Order not created!'], 500);
            }
        }
    }
}
