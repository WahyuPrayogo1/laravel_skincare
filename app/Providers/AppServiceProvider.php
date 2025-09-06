<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;
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


public function boot()
{
    View::composer('components.footer', function ($view) {
        $view->with('categories', Category::all());
    });

     View::composer('components.footer', function ($view) {
        $view->with('latestProducts', Product::all());
    });
}
}
