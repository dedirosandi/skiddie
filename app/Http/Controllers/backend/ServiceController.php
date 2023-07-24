<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\backend\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.service.index', ['services' => Service::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.service.create');
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

        ]);

        $validateData['thumbnail'] = $request->file('thumbnail')->store('image/thumbnail-service');
        Service::create($validateData);
        return redirect('/dashboard/service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('backend.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        //
        $rule = [
            'title' => 'required',
            'thumbnail' => 'image',
        ];

        $validateData = $request->validate($rule);

        if ($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['thumbnail'] = $request->file('thumbnail')->store('image/thumbnail-service');
            # code...
        }
        Service::first()->update($validateData);
        return redirect('/dashboard/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the service by its ID or throw a 404 exception if not found
        $service = Service::findOrFail($id);

        // Check if the service has a thumbnail and delete it from storage if it exists
        if ($service->thumbnail) {
            Storage::delete($service->thumbnail);
        }

        // Delete the service from the database
        $service->delete();

        // Redirect to the service dashboard with a success message
        return redirect('/dashboard/service');
    }
}
