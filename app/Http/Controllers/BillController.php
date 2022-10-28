<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index ()
    {
        $bills = Bill::all();

        return view('Bill.index' , compact('bills'));
    }

    public function create ()
    {
        $users = User::all();
        $products = Product::all();
        return view('Bill.create' , compact('users', 'products'));
    }

    public function store (Request $request)
    {
        // dd($request->all());
        $bill = Bill::create([
            'BillNumber' => $request->BillNumber,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'total' => $request->total
        ]);

        $bill->products()->sync($request->product_ids);

        return redirect( route('bills.all'));
    }

    public function delete ($id)
    {
        $bill = Bill::findOrFail($id);

        $bill->delete();

        return redirect( route('bills.all'));
    }
    
    public function total ($product)
    {
        $price = Product::where('productName', $product)->get();

        return response()->json($price);
    }
}
