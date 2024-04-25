<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class productsController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
    
        // Query products based on category_id if provided
        $query = Products::orderBy("id", "DESC");
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
    
        $products = $query->get();
    
        return view('pages.products.index', ['products' => $products]);
    }
    
    public function create()
    {
        return view('pages.products.create' );
    }
    public function store(Request $request){
        $request->validate([
            "category_id" => 'required',
            "name" => "required",
            "description" => "required",
            "price" => "required",
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);

            
         Products::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imageName, 
            ]);
            return redirect("/products/create")->with('success', 'Product added successfully!');

        }
        // Products::create($request->all());
        
    }

    public function edit(string $id)
    
    {
        $product = Products::find($id);
        
        return view("pages.products.edit", ["product"=>$product]);
    }

    public function update(Request $request, string $id){
        $request->validate([
            "category_id" => 'required',
            "name" => "required",
            "description" => "required",
            "price" => "required",
            'image' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $product = Products::find($id);
        if ($request->hasFile('image')) {
            // If a new image is uploaded, update the image path
            $image = $request->file('image');
            $imageName = 'new'. time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);


             // If a new image is uploaded, delete the old one and update the image path
        // Delete the old image (if it exists)
        $oldImagePath = 'public/images/' . $product->image;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }

            $product->image = $imageName;
        }

        $product->save(); 

        return redirect('/products');
        
        // Products::find($id)->update($request->all());
        // return redirect('/products');
    }
    // public function destroy(string $id)
    // {
    //    $product=  Products::find($id)->delete();
    //    if ($product){
    //      $messages = [
    //         'success' => 'Product deleted successfully.',
    //     ];
    //    }else{
    //         $messages = [
    //             'error' => 'Product not found.',
    //         ];
    //    }
    //    $products = Products::all();
    //    return redirect('pages.products.index')->with(['messages' => $messages, 'products' => $products]);
       
    // }
    public function destroy(string $id)
    {
        Products::find($id)->delete();
        return redirect('/products')->with('success', 'Product Deleted successfully!');
    }
}
