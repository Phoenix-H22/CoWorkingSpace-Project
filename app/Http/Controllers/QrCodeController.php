<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Http;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $response =    Http::withHeaders(
            [
                'X-CSRF-TOKEN' => csrf_token(),
            ]
        )->post('https://192.168.1.101/CoWorkingSpace-Project/public/api/scan', [
            'card_id' => $request->card_id,
        ]);
        $response = json_decode($response);
        return $response;   

    }
    public function cam(){
        return view('cam');
    }


}
