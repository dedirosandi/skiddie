<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //Register
    public function index()
    {
        return view('auth.Register.index');
    }

    public function store(Request $request)
    {
        $validasiDataRegister = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'as' => 'required',
            'description' => 'required',
            'profile_picture' => 'required|image',
        ]);

        $validasiDataRegister['password'] = bcrypt($validasiDataRegister['password']);

        $validasiDataRegister['profile_picture'] = $request->file('profile_picture')->store('image/image-profile-picture');
        User::create($validasiDataRegister);

        return redirect('/dashboard/team');
    }
}
