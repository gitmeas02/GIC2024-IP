<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class WishlistController extends Controller
{
    public function getAllWishlists()
    {
        $wishlists = Wishlist::with('product', 'customer')->get();
        return response()->json($wishlists, Response::HTTP_OK);
    }

    // Get a specific customer's wishlist by customer ID
    public function getWishlistByCustomer($customerId)
    {
        $wishlists = Wishlist::with('product')->where('customer_id', $customerId)->get();
        
        if ($wishlists->isEmpty()) {
            return response()->json(['message' => 'No wishlist found for this customer'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($wishlists, Response::HTTP_OK);
    }

    // Add product to wishlist (create)
    public function createWishlist(Request $request)
    {
        // Validate input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
        ]);

        // Check if the product is already in the customer's wishlist
        $existingWishlist = Wishlist::where('product_id', $request->product_id)
            ->where('customer_id', $request->customer_id)
            ->first();

        if ($existingWishlist) {
            return response()->json(['message' => 'This product is already in your wishlist.'], Response::HTTP_BAD_REQUEST);
        }

        // Create new wishlist entry
        $wishlist = Wishlist::create([
            'product_id' => $request->product_id,
            'customer_id' => $request->customer_id,
        ]);

        return response()->json($wishlist, Response::HTTP_CREATED);
    }

    // Remove product from wishlist (delete)
    public function deleteWishlist($wishlistId)
    {
        $wishlist = Wishlist::find($wishlistId);

        if (!$wishlist) {
            return response()->json(['message' => 'Wishlist item not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the wishlist entry
        $wishlist->delete();

        return response()->json(['message' => 'Product removed from wishlist successfully'], Response::HTTP_OK);
    }
}
