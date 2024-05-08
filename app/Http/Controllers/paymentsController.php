<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class paymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Products::all();
        $payments = Payments::orderBy("id", "DESC")->get();
        return view('pages.payments.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);
        Payments::create($request->all());
        return redirect("/payments/create")->with('success', 'Payment added successfully!');

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
        $payment = Payments::find($id);
        
        return view("pages.payments.edit", ["payment"=>$payment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ]);
        Payments::find($id)->update($request->all());
        return redirect('/payments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payments::find($id)->delete();
        return redirect('/payments')->with('success', 'Payment Deleted successfully!');
    }
}
