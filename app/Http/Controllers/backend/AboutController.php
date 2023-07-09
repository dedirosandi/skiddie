<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\backend\About;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.about.index', ['abouts' => About::first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.about.create');
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
        $validateData = $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'contact' => 'required',
        ]);

        $validateData['thumbnail'] = $request->file('thumbnail')->store('image/thumbnail-about');
        About::create($validateData);
        return redirect('/dashboard/about');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
         $abouts = About::first();
        return view('backend.about.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
        $rule = [
            'title' => 'required',
            'thumbnail' => 'image',
            'description' => 'required',
            'contact' => 'required',
        ];

        $validateData = $request->validate($rule);

        if ($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['thumbnail'] = $request->file('thumbnail')->store('image/thumbnail-about');
            # code...
        }
        About::first()->update($validateData);
        return redirect('/dashboard/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
