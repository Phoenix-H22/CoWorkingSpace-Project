<?php

namespace App\Http\Controllers;

use App\Models\sessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SessionsController as SessionsController;
class AdminController extends Controller
{
    public function index()
    {
        $total_money_today = SessionsController::totalMoney();
        $total_money_month = SessionsController::totalMoneyMonth();
        $total_money_all = SessionsController::totalMoneyAll();
        $last_sessions = sessions::orderBy('created_at', 'desc')->take(5)->get();
        if(Auth::user()->role == 'admin'){
            return view('dashboard.admin.index', compact('total_money_today', 'total_money_month', 'total_money_all', 'last_sessions'));
        }
        else{
            return redirect()->route('home');
        }

    }
}
