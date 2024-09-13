<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Http\View\Composers\CartComposer;

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
        view()->composer('*', CartComposer::class);
        View::composer('layouts.app', function ($view) {
            $categories = Category::where('status', 'Active')->with('products')->get();
            $view->with('categories', $categories);
        });
    }
}
