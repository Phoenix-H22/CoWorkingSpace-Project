<?php

namespace App\Http\Controllers;

use App\Models\stationary;
use Illuminate\Http\Request;

class StationaryController extends Controller
{
    public function index()
    {
        $products = stationary::all();
        return view('dashboard.admin.stationary.index', compact('products'));
    }
    public function create(){

        return view('dashboard.admin.stationary.create');
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        stationary::create([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.stationary.index')->with('success', 'Product added successfully');
    }
    public function edit($id){
        $product = stationary::find($id);
        return view('dashboard.admin.stationary.edit', compact('product'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        $product = stationary::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.stationary.index')->with('success', 'Product updated successfully');
    }
    public function delete($id){
        $product = stationary::find($id);
        $product->delete();
        return redirect()->route('admin.stationary.index')->with('success', 'Product deleted successfully');
    }
}
