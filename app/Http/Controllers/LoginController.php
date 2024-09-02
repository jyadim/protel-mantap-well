<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }

    return view('login'); // Ganti dengan nama view yang sesuai
}


public function authenticate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string',
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('admin.login')
                         ->withInput()
                         ->withErrors($validator);
    }

    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('admin.login')
                         ->withInput()
                         ->with('error', 'Either username or password is incorrect.');
    }
    
}


    public function register(){
        return view('register');
       
    }
    public function processRegister(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'username' => 'required|string|unique:users|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->route('admin.register')->withInput()->withErrors($validator);
    }

    $user = new User();
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->is_admin = true;
    $user->save();

    return redirect()->route('admin.login')->with('success', 'You Have Registered Successfully.');
}
public function logout()
{
    Auth::logout();
    return redirect()->route('admin.login');
}
}
