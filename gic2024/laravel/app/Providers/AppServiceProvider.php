<?php

namespace App\Providers;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use App\Observers\ModelActivityObserver;
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Order::observe(ModelActivityObserver::class);
    }
}
