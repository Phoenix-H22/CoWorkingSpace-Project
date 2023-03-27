<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $products = gallery::all();
        return view('dashboard.admin.gallery.index', compact('products'));
    }
    public function create(){

        return view('dashboard.admin.gallery.create');
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
        gallery::create([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Product added successfully');
    }
    public function edit($id){
        $product = gallery::find($id);
        return view('dashboard.admin.gallery.edit', compact('product'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'status' => 'required|numeric',
        ]);
        $product = gallery::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description? $request->description : "",
            'image' => $request->image? $request->image : "",
            'price' => $request->price,
            'cost' => $request->cost,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.gallery.index')->with('success', 'Product updated successfully');
    }
    public function delete($id){
        $product = gallery::find($id);
        $product->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Product deleted successfully');
    }
}
