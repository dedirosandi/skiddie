<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\backend\Project;
use App\Http\Controllers\Controller;
use App\Models\backend\ProjectImage;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.project.index', ['projects' => Project::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.project.create', ['teams' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'slug' => 'required|string|unique:projects',
        'price' => 'required|numeric',
        'demo_link' => 'nullable|url',
        'tools' => 'nullable|string',
        'user_id' => 'required|array',
        'user_id.*' => 'exists:users,id',
        'body' => 'nullable',
        'image.*' => 'nullable|image|max:2048',
    ]);

    $project = Project::create($validatedData);
    $project->users()->attach($validatedData['user_id']);

    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $image) {
            $imagePath = $image->store('image/image-project');

            $imageModel = new ProjectImage();
            $imageModel->image = $imagePath;

            $project->project_images()->save($imageModel);
        }
    }

    return redirect('/dashboard/project');
}







    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
{
    // $recentProjects = Project::latest()->take(3)->get();
    $recentProjects = Project::latest('updated_at')->take(3)->get();

    return view('backend.project.show', compact('project', 'recentProjects'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\Project  $project
     * @return \Illuminate\Http\Response
     */
   public function edit($slug)
{
    $project = Project::where('slug', $slug)->firstOrFail();
    $teams = User::all();
    return view('backend.project.edit', compact('project', 'teams'));
}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\Project  $project
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, $slug)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'slug' => 'required|string',
        'price' => 'required|numeric',
        'demo_link' => 'nullable|url',
        'tools' => 'nullable|string',
        'user_id' => 'required|array',
        'user_id.*' => 'exists:users,id',
        'body' => 'nullable',
        'image.*' => 'nullable|image|max:2048',
    ]);

    $project = Project::where('slug', $slug)->firstOrFail();

    $project->name = $validatedData['name'];
    $project->price = $validatedData['price'];
    $project->demo_link = $validatedData['demo_link'];
    $project->tools = $validatedData['tools'];
    $project->body = $validatedData['body'];

    // Menghapus semua entri hubungan user sebelum menambahkan yang baru
    $project->users()->detach();
    $project->users()->attach($validatedData['user_id']);

    // Periksa apakah slug baru sama dengan slug yang ada sebelumnya
    if ($validatedData['slug'] !== $slug) {
        $project->slug = $validatedData['slug'];
    }

    // Menghapus foto lama dari penyimpanan jika ada perubahan gambar
    if ($request->hasFile('image.*')) {
        foreach ($project->project_images as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
    }

    $currentDateTime = Carbon::now();
    $project->updated_at = $currentDateTime;

    $project->save();

    // Menyimpan foto-foto baru jika ada perubahan gambar
    if ($request->hasFile('image.*')) {
        foreach ($request->file('image') as $image) {
            $imagePath = $image->store('image/image-project');

            $imageModel = new ProjectImage();
            $imageModel->image = $imagePath;

            $project->project_images()->save($imageModel);
        }
    }

    return redirect('/dashboard/project');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
{
    $project = Project::where('slug', $slug)->firstOrFail();

    // Hapus file gambar dari penyimpanan
    foreach ($project->project_images as $image) {
        Storage::delete($image->image);
    }

    // Hapus semua project_images terkait
    $project->project_images()->delete();

    // Hapus project
    $project->delete();

    return redirect('/dashboard/project')->with('success', 'Project deleted successfully.');
}

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
