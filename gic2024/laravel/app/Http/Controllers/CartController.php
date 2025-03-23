<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Get all cart items for the authenticated customer
    public function getCartItems()
    {
        // You could implement authentication here to get the logged-in customer
        $customerId = auth()->id(); // Assuming the customer is authenticated

        // Fetch cart items for the authenticated customer, along with the associated product data
        $cartItems = Cart::with('product')->where('customer_id', $customerId)->get();

        return response()->json($cartItems);
    }

    // Get a specific cart item by ID
    public function getCartItem($cartId)
    {
        $cartItem = Cart::with('product')->find($cartId);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        return response()->json($cartItem);
    }

    // Add a product to the cart
    public function addToCart(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'quantity' => 'required|integer|min:1', // Validate quantity
        ]);

        $customerId = auth()->id(); // Assuming the customer is authenticated

        // Check if the product already exists in the cart for the current customer
        $existingCartItem = Cart::where('customer_id', $customerId)
                                ->where('product_id', $request->product_id)
                                ->first();

        if ($existingCartItem) {
            // If the product is already in the cart, just update the quantity
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'customer_id' => $customerId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart'], 201);
    }

    // Update the quantity of a cart item
    public function updateCartItem(Request $request, $cartId)
    {
        // Validate the incoming request
        $request->validate([
            'quantity' => 'required|integer|min:1', // Validate quantity
        ]);

        $cartItem = Cart::find($cartId);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        // Update the quantity of the cart item
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json($cartItem);
    }

    // Remove a cart item
    public function removeFromCart($cartId)
    {
        $cartItem = Cart::find($cartId);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        // Delete the cart item
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }
}
