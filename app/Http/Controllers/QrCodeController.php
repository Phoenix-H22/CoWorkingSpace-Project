<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;

class QrCodeController extends Controller
{
    public function index()
    {
       $data = 'https://www.google.com';
        echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';
    }
    public function cam(){
        return view('cam');
    }
    

}
