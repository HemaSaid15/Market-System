<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(8);
        return view('Products.index' , compact('products'));
    }


    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'ProductName' => 'required|string|min:5',
            'Price' => 'required',
        ],
        [
            'ProductName.required' => 'Please Enter Product Name',
            'ProductName.min' => 'Product Name Must be More Than 5 Characters',
        ]);

        Product::create([
            'ProductName' => $request->ProductName,
            'Price' => $request->Price, 
            
        ]);

        return redirect( route('products.all'))->with('success','Product Added Successfully ');


    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit' , compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'ProductName' => 'required|string|min:5',
            'Price' => 'required',
        ],
        [
            'ProductName.required' => 'Please Enter Product Name',
            'ProductName.min' => 'Product Name Must be More Than 5 Characters',
        ]);

        $product = Product::findOrFail($id);
        
        $product->update([
            'ProductName' => $request->ProductName,
            'Price' => $request->Price,    
        ]);
        

        return redirect( route('products.all'))->with('success','Product Updated Successfully ');
        
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect( route('products.all'))->with('success','Product Deleted Successfully ');
    }
}
