<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function(){
    Route::get('/','getCategories');
    Route::post('/','createCategory');
    Route::get('/{categoryId}','getCategory');
    Route::patch('/{categoryId}','updateCategory');
    Route::delete('/{categoryId}','deleteCategory');
});

// Product routes
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'getProducts'); 
    Route::post('/', 'createProduct'); 
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct'); 
    Route::delete('/{productId}', 'deleteProduct'); 
});

Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::get('/', 'getOrders'); 
    Route::post('/', 'createOrder'); 
    Route::get('/{orderId}', 'getOrder');
    Route::patch('/{orderId}', 'updateOrder'); 
    Route::delete('/{orderId}', 'deleteOrder'); 
});

Route::controller(WishlistController::class)->prefix('wishlists')->group(function () {
    Route::get('/', 'getAllWishlists'); 
    Route::get('/{customerId}', 'getWishlistByCustomer'); 
    Route::post('/', 'createWishlist'); 
    Route::delete('/{wishlistId}', 'deleteWishlist'); 
});
use App\Http\Controllers\CustomerController;

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'getAllCustomers']); // List all customers
    Route::get('/{customerId}', [CustomerController::class, 'getCustomer']); // Get a specific customer
    Route::post('/', [CustomerController::class, 'createCustomer']); // Create a new customer
    Route::put('/{customerId}', [CustomerController::class, 'updateCustomer']); // Update an existing customer
    Route::delete('/{customerId}', [CustomerController::class, 'deleteCustomer']); // Delete a customer
});

Route::controller(OrderProductController::class)->prefix('order-products')->group(function () {
    Route::get('/', 'getAllOrderProducts'); 
    Route::get('/{orderProductId}', 'getOrderProduct'); 
    Route::post('/', 'createOrderProduct');
    Route::patch('/{orderProductId}', 'updateOrderProduct'); 
    Route::delete('/{orderProductId}', 'deleteOrderProduct');
});

Route::controller(PaymentController::class)->prefix('payments')->group(function(){
    Route::get('/', 'getAllPayments');
    Route::get('/{paymentId}', 'getPayment');
    Route::post('/', 'createPayment');
    Route::patch('/{paymentId}', 'updatePayment');
    Route::delete('/{paymentId}', 'deletePayment');
});

Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class, 'getCartItems']); // List all cart items for the authenticated customer
    Route::get('/{cartId}', [CartController::class, 'getCartItem']); // Get a specific cart item by ID
    Route::post('/', [CartController::class, 'addToCart']); // Add an item to the cart
    Route::put('/{cartId}', [CartController::class, 'updateCartItem']); // Update quantity of a cart item
    Route::delete('/{cartId}', [CartController::class, 'removeFromCart']); // Remove an item from the cart
});