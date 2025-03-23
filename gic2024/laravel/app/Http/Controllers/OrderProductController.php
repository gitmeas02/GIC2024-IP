<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderProductController extends Controller
{
    // Get all order products
    public function getAllOrderProducts()
    {
        $orderProducts = OrderProduct::with('product', 'order')->get(); // Eager load product and order relationships
        return response()->json($orderProducts, Response::HTTP_OK);
    }

    // Get a single order product by ID
    public function getOrderProduct($orderProductId)
    {
        $orderProduct = OrderProduct::with('product', 'order')->find($orderProductId);

        if (!$orderProduct) {
            return response()->json(['message' => 'Order product not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($orderProduct, Response::HTTP_OK);
    }

    // Create a new order product
    public function createOrderProduct(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'order_id' => 'required|exists:orders,id', // Ensure order exists
            'product_id' => 'required|exists:products,id', // Ensure product exists
            'price' => 'required|numeric|min:0', // Ensure price is a positive number
            'quantity' => 'required|integer|min:1', // Ensure quantity is at least 1
        ]);

        // Create a new order product
        $orderProduct = OrderProduct::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return response()->json($orderProduct, Response::HTTP_CREATED);
    }

    // Update an existing order product
    public function updateOrderProduct(Request $request, $orderProductId)
    {
        $orderProduct = OrderProduct::find($orderProductId);

        if (!$orderProduct) {
            return response()->json(['message' => 'Order product not found'], Response::HTTP_NOT_FOUND);
        }

        // Validate the incoming request data
        $request->validate([
            'price' => 'nullable|numeric|min:0', // Ensure price is a positive number
            'quantity' => 'nullable|integer|min:1', // Ensure quantity is at least 1
        ]);

        // Update the order product
        $orderProduct->update([
            'price' => $request->price ?? $orderProduct->price,
            'quantity' => $request->quantity ?? $orderProduct->quantity,
        ]);

        return response()->json($orderProduct, Response::HTTP_OK);
    }

    // Delete an order product by ID
    public function deleteOrderProduct($orderProductId)
    {
        $orderProduct = OrderProduct::find($orderProductId);

        if (!$orderProduct) {
            return response()->json(['message' => 'Order product not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the order product
        $orderProduct->delete();

        return response()->json(['message' => 'Order product deleted successfully'], Response::HTTP_OK);
    }
}
