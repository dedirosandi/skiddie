<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //View Login
    public function index()
    {
        return view('auth.login.index');
    }
    // Process Login
    public function authenticate(Request $request)
    {
        $validasiDataRegister = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validasiDataRegister)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('LoginErrors', 'Login Failed.');
    }
}
