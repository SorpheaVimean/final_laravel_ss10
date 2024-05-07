<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            // Find the order by ID
        $order = Orders::find($id);

        if (!$order) {
            // Handle case where order is not found
            return view('order.not_found');
        }

        // Retrieve order details for the given order ID
        // $orderDetails = OrderDetail::where('order_id', $id)->get();

        // You can also eager load related product information if needed
        $orderDetails = OrderDetail::with('getproduct')->where('order_id', $id)->get();

        return view('pages.orders.show', [ 'order_details' => $orderDetails]);
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
        //
    }
}
