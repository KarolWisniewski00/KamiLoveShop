<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function ($view) {
            $categories = Category::get();
            $view->with('categories', $categories);
        });
        View::composer('*', function ($view) {
            $cat = Category::orderBy('order')->get();
            $view->with('pro_cat', $cat);
        });
        View::composer('*', function ($view) {
            $prod = Product::orderBy('order')->get();
            $view->with('pro_prod', $prod);
        });
        View::composer('*', function ($view) {
            $subcat = Subcategory::orderBy('order')->get();
            $view->with('pro_subcat', $subcat);
        });
    }
}
