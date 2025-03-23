<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    // Get all orders
    public function getOrders()
    {
        $orders = Order::with('customer', 'payment', 'order_product')->get();
        return response()->json($orders, Response::HTTP_OK);
    }

    // Get a single order by ID
    public function getOrder($orderId)
    {
        $order = Order::with('customer', 'payment', 'order_product')->find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($order, Response::HTTP_OK);
    }

    // Create a new order
    public function createOrder(Request $request)
    {
        
        $request->validate([
            'total_price' => 'required|numeric|min:0.01',
            'customer_id' => 'required|exists:customers,id',
        ]);
    
        $order = Order::create([
            'total_price' => $request->total_price,
            'customer_id' => $request->customer_id,
        ]);
    
        return response()->json($order, 201);
    }
    
    

    public function updateOrder(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'total_price' => 'nullable|numeric|min:0.01',
            'customer_id' => 'nullable|exists:customers,id',
        ]);

        $order->update([
            'total_price' => $request->total_price ?? $order->total_price,
            'customer_id' => $request->customer_id ?? $order->customer_id,
        ]);

        return response()->json($order, Response::HTTP_OK);
    }

    // Delete an order by ID
    public function deleteOrder($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the order
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], Response::HTTP_OK);
    }
}
