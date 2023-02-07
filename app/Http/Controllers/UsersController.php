<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users =  User::all();
        return view('dashboard.admin.users.index', compact('users'));
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.users.edit', compact('user'));
    }
    // update user
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => '',
            'role' => 'required',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->update();
        if ($user->update()) {
            return redirect()->route('admin.user.index')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('admin.user.edit')->with('error', 'User already exists');
        }
    }
    // delete user
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully');
    }
}
