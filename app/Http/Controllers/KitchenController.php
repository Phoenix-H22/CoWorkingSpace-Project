<?php

namespace App\Http\Controllers;

use App\Models\kitchen;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function index()
    {
        $products = kitchen::all();
        return view('dashboard.admin.kitchen.index', compact('products'));
    }
    public function create(){

        return view('dashboard.admin.kitchen.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category' => 'required',
            'status' => 'required|numeric',
        ]);
        kitchen::create([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.kitchen.index')->with('success', 'Product added successfully');
    }
    public function edit($id){
        $product = kitchen::find($id);
        return view('dashboard.admin.kitchen.edit', compact('product'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category' => 'required',
            'status' => 'required|numeric',
        ]);
        $product = kitchen::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.kitchen.index')->with('success', 'Product updated successfully');
    }
    public function delete($id){
        $product = kitchen::find($id);
        $product->delete();
        return redirect()->route('admin.kitchen.index')->with('success', 'Product deleted successfully');
    }
}
