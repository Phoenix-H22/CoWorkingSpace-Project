<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\kitchen;
use App\Models\stationary;
use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\api\sessionsController;
class QrCodeController extends Controller
{
    public function index(Request $request)
    {
       $qr = SessionsController::scan($request);
    //    dd($qr);
        return response()->json($qr->original, 200);
    }
    public function scan(){
        $gallery_products = gallery::get();
        $kitchen_products = kitchen::get();
        $stationary_products = stationary::get();
        return view('dashboard.admin.checkout.scan', compact('gallery_products', 'kitchen_products', 'stationary_products'));
    }


}
