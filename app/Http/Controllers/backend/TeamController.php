<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('backend.team.index', ['teams' => User::all()]);
        return view('backend.team.index', ['teams' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        // dd($id);
        $user = User::findOrFail($id);
        return view('backend.team.edit', ['teams' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'as' => 'required',
            'description' => 'required',
            'profile_picture' => 'image',
        ];

        // Tambahkan validasi untuk password jika ada perubahan
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8';
        }

        $validatedData = $request->validate($rules);

        // Dapatkan objek User berdasarkan ID yang diberikan
        $user = User::findOrFail($id);

        if ($request->file('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('image/image-profile-picture');
        }

        // Periksa apakah password berubah dan lakukan pengolahan jika ya
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // Update data pengguna
        $user->update($validatedData);

        return redirect('/dashboard/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }
        $user->delete();
        return redirect('/dashboard/team');
    }
}
