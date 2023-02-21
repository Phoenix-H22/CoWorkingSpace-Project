<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\sessions;

class SessionsController extends Controller
{
    public function index()
    {
        $sessions =  sessions::all();
        return view('dashboard.admin.sessions.index', compact('sessions'));
    }
    public function create()
    {
        return view('dashboard.admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $user = new sessions();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        // if email is already taken then redirect to create page with error message
        if ($user->save()) {
            return redirect()->route('admin.user.index')->with('success', 'User created successfully');
        } else {
            return redirect()->route('admin.user.create')->with('error', 'User already exists');
        }
    }
    // calculate total money for one day
    public static function totalMoney()
    {
        $total = sessions::whereDate('created_at', Carbon::today())->sum('total_price');
        return $total;
    }
    // calculate total money for one month
    public static function totalMoneyMonth()
    {
        $total = sessions::whereMonth('created_at', Carbon::now()->month)->sum('total_price');
        return $total;
    }
    // calculate total money for all time
    public static function totalMoneyAll()
    {
        $total = sessions::sum('total_price');
        return $total;
    }
    // scan qr code
    public function scan()
    {
        return view('dashboard.admin.sessions.scan');
    }

}
