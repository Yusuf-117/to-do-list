<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login/index");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tasks');
        }

        return back()->withErrors([
            'msg' => 'Incorrect credentials',
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
