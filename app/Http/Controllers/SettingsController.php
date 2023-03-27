<?php

namespace App\Http\Controllers;

use App\Models\settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = settings::first();
        // dd($settings);
        return view('dashboard.admin.settings.index', compact('settings'));
    }
    public function store(Request $request){
        $request->validate([
            'big_room_price_per_hour'   => 'required|numeric',
            'small_room_price_per_hour' => 'required|numeric',
            'shared_area_price_per_hour' => 'required|numeric',
        ]);
        $settings = settings::first();
        $settings->update([
            'big_room_price_per_hour'   => $request->big_room_price_per_hour,
            'small_room_price_per_hour' => $request->small_room_price_per_hour,
            'shared_area_price_per_hour' => $request->shared_area_price_per_hour,
        ]);
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully');
    }

}
