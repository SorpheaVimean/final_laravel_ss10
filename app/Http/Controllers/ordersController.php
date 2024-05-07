<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::orderBy("id", "DESC")->get();
        return view('pages.orders.index', ['orders' => $orders]);
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
    //         'user_id' => 'required',
    //         'payment_method_id' => 'required',
    //         'total_order' => 'required',
    //     ]);
    
    //     $userId = auth()->id();

    //     // Fetch user with associated carts using eager loading
    //     $user = User::with('carts.product')->with('getproduct')->find($userId);

    //     // Check if the user has any carts
    //     if ($user->getAllCarts->isEmpty()) {
    //         return response()->json([
    //             'error' => true,
    //             'message' => 'Your cart is empty!',
    //         ]);
    //     }

    //     // Calculate order total
    //     $orderTotal = $user->getAllCarts->sum(function ($cart) {
    //         return $cart->getproduct->price * $cart->quantity;
    //     });

    //     // Create the order
    //     $order = new Orders();
    //     $order->user_id = $userId;
    //     $order->payment_method_id = $request->payment_method_id;
    //     $order->order_total = $orderTotal;
    //     $order->comment = $request->comment;
    //     $order->save();

    //     // Attach order details to the order
    //     foreach ($user->getAllCarts as $cart) {
    //         $order->orderDetails()->create([
    //             'order_id' => $cart->product_id,
    //             'product_id' => $cart->product_id,
    //             'quantity' => $cart->quantity,
    //             'price' => $cart->product->price,
    //             'total' => $cart->orderTotal,
    //         ]);
    //     }

    //     // Update product stock and delete carts
    //     foreach ($user->carts as $cart) {
    //         $cart->delete();
    //     }

    //     // Send success response
    //     return view('dashboard');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'payment_method_id' => 'required',
            'total_order' => 'required',
        ]);
    
        $userId = auth()->id();
        
        if ($userId) {
            $user = User::findOrFail($userId); // Retrieve the authenticated user
            $carts = $user->getAllCarts()->with('getproduct')->get(); // Retrieve the user's carts
    
            // Calculate the total price (subtotal) by summing up product prices
            $subtotal = $carts->sum(function ($cartItem) {
                return $cartItem->getproduct->price * $cartItem->quantity;
            });
        }
    
        // Create the order
        $order = new Orders();
        $order->user_id = $userId;
        $order->payment_method_id = $request->payment_method_id;
        $order->total_order = $subtotal;
        $order->comment = $request->comment;
        $order->save();
    
        // Attach order details to the order if carts exist
        if (isset($carts)) {
            foreach ($carts as $cart) {
                $order->orderDetails()->create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->getproduct->price,
                    'total_price' => $cart->getproduct->price * $cart->quantity,
                ]);
            }

            // Clear the user's carts
            $user->carts()->delete();
        }
        // Send success response
        return redirect()->route('dashboard')->with('success', 'Your order has been placed successfully!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Orders::find($id)->delete();
        return redirect('/orders');
    }
}
