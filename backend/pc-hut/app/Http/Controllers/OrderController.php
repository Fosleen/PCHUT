<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
}
