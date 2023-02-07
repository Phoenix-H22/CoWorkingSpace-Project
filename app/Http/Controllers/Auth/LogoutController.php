<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    function perform()
    {
      if (Auth::check()) {
      Session::flush();
        
        Auth::logout();
    
    }
    return redirect('login');
    }
}
