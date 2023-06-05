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
        return view('Auth.Register.index');
    }

    public function store(Request $request)
    {
        $validasiDataRegister = $request->validate([
            'name' => 'required',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $validasiDataRegister['password'] = bcrypt($validasiDataRegister['password']);

        $user = User::Create($validasiDataRegister);

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $user->uploadProfilePicture($profilePicture);
        }

        $request->session()->flash('success', 'Registration Successfull, Please login');

        return redirect('/login');
    }
}
