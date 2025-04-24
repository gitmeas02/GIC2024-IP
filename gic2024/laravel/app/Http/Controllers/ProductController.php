<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // --- Get all products
    // public function getProducts()
    // {
    //     $products = Product::with('category')->get(); // Eager load the category relationship
    //     return response()->json($products);
    // }
    public function getProducts(){
        $products= Product::all();
        return response()->json($products);
    }
    // --- Create a new product
    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'pricing' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array', // Ensure 'images' is an array
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'pricing' => $request->pricing,
            'description' => $request->description,
            'images' => $request->images, // Automatically cast to JSONB
        ]);

        return response()->json($product, 201);
    }

    // --- Get a specific product by ID
    public function getProduct($productId)
    {
        // $product = Product::with('category')->findOrFail($productId); // Eager load the category
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        } // Eager load the category
        return response()->json($product,200);
    }

    // --- Update a product
    public function updateProduct(Request $request, $productId)
{
    $product = Product::find($productId);

    if (!$product) {
        return response()->json([
            'message' => 'Product not found'
        ], 404);
    }

    $validatedData = $request->validate([
        'name' => 'sometimes|string|max:255',
        'category_id' => 'sometimes|exists:categories,id',
        'pricing' => 'sometimes|numeric|min:0',
        'description' => 'nullable|string',
        'images' => 'nullable|array',
    ]);

    if (isset($validatedData['images'])) {
        $validatedData['images'] = json_encode($validatedData['images']);
    }

    $product->update($validatedData);

    return response()->json([
        'message' => 'Product updated successfully',
        'product' => $product->fresh(),
    ], 200);
}


    // --- Delete a product
    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}