<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Http\View\Composers\CartComposer;
use App\Models\Brand;

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
            // Fetch only active categories that have products
            $categories = Category::where('status', 'Active')
                ->has('products') // Only include categories that have related products
                ->withCount('products') // Get the count of related products
                ->orderBy('products_count', 'desc') // Sort categories by product count in descending order
                ->get();
            $brands = Brand::where('status', 'Active')
                ->has('products') // Only include categories that have related products
                ->withCount('products') // Get the count of related products
                ->orderBy('products_count', 'desc') // Sort categories by product count in descending order
                ->get();

            $view->with('categories', $categories)->with('brands', $brands);
        });
    }

}
