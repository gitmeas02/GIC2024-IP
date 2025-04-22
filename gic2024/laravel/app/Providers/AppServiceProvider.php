<?php

namespace App\Providers;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use App\Observers\ModelActivityObserver;
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Order::observe(ModelActivityObserver::class);
        Customer::observe(ModelActivityObserver::class);
        Category::observe(ModelActivityObserver::class);
        Cart::observe(ModelActivityObserver::class);
        Product::observe(ModelActivityObserver::class);
        Wishlist::observe(ModelActivityObserver::class);
        Payment::observe(ModelActivityObserver::class);
        Category::observe(ModelActivityObserver::class);
    }
}
