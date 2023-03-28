<?php

namespace App\Http\Controllers;

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
        return response()->json([$qr], 200);
    }
    public function cam(){
        return view('cam');
    }


}
