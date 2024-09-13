<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $categories = Category::where('status', 'Active')->with('products')->get();
            //return a snumber to 10 to show whene it will render the cart
            $cartTotal = 522; // Or fetch actual cart total if available
            $view->with('categories', $categories)
                 ->with('cart', $cartTotal);

            // $view->with('categories', $categories)->with('cart', '522');
        });
    }
}
