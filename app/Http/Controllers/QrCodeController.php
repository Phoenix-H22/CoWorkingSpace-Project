<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\api\SessionsController;
class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        // SessionsController::scan($request);
        return response()->json(['data' => 'done'], 200);

    }
    public function cam(){
        return view('cam');
    }


}
