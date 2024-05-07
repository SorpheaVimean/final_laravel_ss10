<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'user_id' => 'required',
        'product_id' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    // Retrieve validated data from the request
    $user_id = $request->user_id;
    $product_id = $request->product_id;
    $quantity = $request->quantity;

    // Check if there's an existing cart entry for the same user and product
    $existingCart = Carts::where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

    if ($existingCart) {
        // Update the quantity if the cart entry already exists
        $existingCart->quantity += $quantity;
        $existingCart->save();
    } else {
        // Create a new cart entry
        Carts::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
        ]);
    }

    // Redirect to the dashboard or return a success response
    return redirect('/dashboard')->with('success', 'Product added to cart successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'quantity' => 'required|integer', 
        ]);
    
        $cart = Carts::find($id);
    
        // Retrieve the new quantity from the request
        $newQuantity = $request->quantity;
    
        // Ensure the new quantity is positive (if not, we assume the user intends to decrease the quantity)
        if ($newQuantity <= 0) {
            // Ensure the resulting quantity doesn't become negative
            if ($cart->quantity + $newQuantity >= 0) {
                $cart->quantity += $newQuantity;
            } else {
                // If resulting quantity would be negative, set it to 1
                $cart->quantity = 1;
            }
        } else {
            // Increase the quantity
            $cart->quantity = $newQuantity;
        }
    
        // Save the updated cart item
        $cart->save();
    
        // Redirect back to the dashboard with success message
        return redirect()->route('dashboard')->with('success', 'Cart item updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Carts::find($id)->delete();
        return redirect('/dashboard');
    }
}
