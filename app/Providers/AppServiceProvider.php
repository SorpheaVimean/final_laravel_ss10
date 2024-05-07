<?php

namespace App\Providers;

use App\Models\Carts;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Products;
use App\Models\User;

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
        Schema::defaultStringLength(191);


        
        // Register view composer
        View::composer(['dashboard'], function ($view) {
            $request = app('request');
            $categoryId = $request->input('category_id');

            // Query products based on category_id if provided
            $query = Products::orderBy("id", "DESC");
            if ($categoryId) {
                $query->where('category_id', $categoryId);
            }

            $products = $query->get();

            $view->with('products', $products);
        });

        // View::composer(['dashboard'], function ($view) {
        //     $userId = auth()->id();
        
        //     $query = Carts::orderBy("id", "DESC");
        //     if ($userId) {
        //         $query->where('user_id', $userId);
        //     }
        //     $carts = $query->get();
        //     $carts = $carts->getAllCarts;
        
        //     $view->with('carts', $carts); // Pass the carts with associated products to the view
        // });
        View::composer(['dashboard'], function ($view) {
            $userId = auth()->id();
        
            if ($userId) {
                $user = User::findOrFail($userId); // Retrieve the authenticated user
                $carts = $user->getAllCarts()->with('getproduct')->orderBy('id', 'DESC')->get(); // Retrieve the user's carts
        
                // Calculate the total price (subtotal) by summing up product prices
                $subtotal = $carts->sum(function ($cartItem) {
                    return $cartItem->getproduct->price * $cartItem->quantity;
                });
            } else {
                $carts = collect(); // Empty collection if user is not authenticated
                $subtotal = 0; // Initialize subtotal to zero
            }
        
            $view->with('carts', $carts)->with('subtotal', $subtotal); // Pass the carts and subtotal to the view
        });
        
        
        
        

    }
}
