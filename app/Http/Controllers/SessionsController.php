<?php

namespace App\Http\Controllers;

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
        $user = new User();
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

    // scan qr code
    public function scan()
    {
        return view('dashboard.admin.sessions.scan');
    }
   
}
