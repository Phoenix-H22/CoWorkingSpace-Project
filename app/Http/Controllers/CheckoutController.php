<?php

namespace App\Http\Controllers;

use App\Models\settings;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
    public function store(Request $request)
    {
        $request->validate([
            'session_code' => 'required|numeric',
            'area_type' => 'required|numeric',
        ]);
        // dd($request->all());
        $session_code = $request->session_code;
        $area_type = $request->area_type;
        if($area_type == 1){
            $area_price = settings::select('shared_area_price_per_hour')->first()->shared_area_price_per_hour;
            $area_name = 'Shared Area';
            // dd($area_price);
        }elseif($area_type == 2){
            $area_price = settings::select('small_room_price_per_hour')->first()->small_room_price_per_hour;
            $area_name = 'Small Room';

        }elseif($area_type == 3){
            $area_price = settings::select('big_room_price_per_hour')->first()->big_room_price_per_hour;
            $area_name = 'Big Room';
        }
        foreach($request->gallery as $product_id){
            $product = \App\Models\gallery::find($product_id);
            $gallery_products[] = $product;
        }
        foreach($request->kitchen as $product_id){
            $product = \App\Models\kitchen::find($product_id);
            $kitchen_products[] = $product;
        }
        foreach($request->stationary as $product_id){
            $product = \App\Models\stationary::find($product_id);
            $stationary_products[] = $product;
        }
        return view('dashboard.admin.checkout.checkout', compact('session_code', 'area_type', 'area_price', 'area_name', 'gallery_products', 'kitchen_products', 'stationary_products'));
    }
}
