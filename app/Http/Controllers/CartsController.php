<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     // Get the authenticated user's ID (assuming you're using authentication)
    // $userId = auth()->id();

    // // Retrieve carts associated with the user
    // $carts = Carts::where('user_id', $userId)->get();

    // return view('dashboard', ['carts' => $carts]);
    $carts = Carts::orderBy("id", "DESC")->get();
    return view('dashboard', ['carts' => $carts]);
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
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         "user_id" => 'required',
    //         "product_id" => "required",
    //         "quantity" => "required",
    //     ]);
    //     $user_id = $request->user_id;
    //     $product_id = $request->product_id;
    //     $quantity = 1; // Default quantity to 1, you can customize this if needed
    
    //     if (empty($user_id) || empty($product_id)) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => "user_id and product_id are required!",
    //         ]);
    //     }
    
    //     // Check if there's already an existing cart entry for the same customer and product combination
    //     $existingCart = Carts::where('user_id', $user_id)
    //                           ->where('product_id', $product_id)
    //                           ->first();
    
    //     if ($existingCart) {
    //         // If a matching entry exists, update the quantity by incrementing it
    //         $existingCart->quantity += $quantity;
    //         $existingCart->save();
    //     } else {
    //         // If no matching entry exists, insert a new row into the carts table
    //         $newCart = new Carts();
    //         $newCart->user_id = $user_id;
    //         $newCart->product_id = $product_id;
    //         $newCart->quantity = $quantity;
    //         $newCart->save();
    //     }
    
    //     return view('dashboard');
    // }
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1', // Ensure quantity is a positive integer
        ]);

        // Ensure the user is authenticated
        if (!auth()->check()) {
            return response()->json([
                'error' => true,
                'message' => 'User authentication failed.',
            ], 401); // Unauthorized status code
        }

        // Retrieve validated data from the request
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        // Check if there's already an existing cart entry for the same user and product combination
        $existingCart = Carts::where('user_id', $user_id)
                            ->where('product_id', $product_id)
                            ->first();

        if ($existingCart) {
            // If a matching entry exists, update the quantity by adding the new quantity
            $existingCart->quantity += $quantity;
            $existingCart->save();
        } else {
            // If no matching entry exists, insert a new row into the carts table
            $newCart = new Carts();
            $newCart->user_id = $user_id;
            $newCart->product_id = $product_id;
            $newCart->quantity = $quantity;
            $newCart->save();
        }

        // Redirect to the dashboard or return a success response
        return view('dashboard')->with('success', 'Product added to cart successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carts $carts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Carts::find($id)->delete();
        return redirect('/dashboard');
    }

    public function destroyAll(Carts $carts)
    {
        $carts->delete();
        return redirect('/dashboard');

    }
}
