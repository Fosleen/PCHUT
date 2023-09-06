<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
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
                'order' => new OrderResource($order),
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
            'payment' => 'required|integer',
            'delivery_status' => 'required|integer',
            'component_id' => 'required|array',
            'component_id.*' => 'required|integer',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer',
            'order_name' => 'required|string',
            'order_address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        } else {
            $order = Order::create([
                'id' => $request->order_id,
                'payment' => $request->payment,
                'delivery_status' => $request->delivery_status,
                'user_id' => $request->user_id,
                'order_name' => $request->order_name,
                'order_address' => $request->order_address,
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

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Order successfully deleted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Order not found!'
            ], 404);
        }
    }

    public function getOrdersByUser($id)
    {
        $orders = Order::all()->where('user_id', $id);

        foreach ($orders as $order) {
            $order->component;
        }

        if ($orders->count() > 0) {
            $data = [
                'status' => 200,
                'orders' => $orders->map(function ($order) {
                    return new OrderResource($order);
                }),
            ];
            return response()->json($data, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No orders"
            ], 404);
        }
    }
}
