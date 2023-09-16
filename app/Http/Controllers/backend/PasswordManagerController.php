<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\PasswordManager;
use Illuminate\Http\Request;

class PasswordManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $passwordmanagers = PasswordManager::all();
        return view('backend.password-manager.index', compact('passwordmanagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\PasswordManager  $passwordManager
     * @return \Illuminate\Http\Response
     */
    public function show(PasswordManager $passwordManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\PasswordManager  $passwordManager
     * @return \Illuminate\Http\Response
     */
    public function edit(PasswordManager $passwordManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\PasswordManager  $passwordManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordManager $passwordManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\PasswordManager  $passwordManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordManager $passwordManager)
    {
        //
    }
}
