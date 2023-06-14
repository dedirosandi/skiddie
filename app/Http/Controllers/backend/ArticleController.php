<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\backend\Article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.article.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'category' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image',
        ]);

       $validatedData['thumbnail'] = $request->file('thumbnail')->store('image/thumbnail-article');
       $validatedData['user_id'] = Auth::user()->id;
        Article::create($validatedData);

        // Redirect ke halaman yang diinginkan
        return redirect('/dashboard/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\backend\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        // $recentArticles = Article::latest('updated_at')->take(3)->get();
        $recentArticles = Article::latest()->take(3)->get();

    return view('backend.article.show', compact('article', 'recentArticles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\backend\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\backend\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\backend\Article  $article
     * @return \Illuminate\Http\Response
     */
   public function destroy($slug)
{
    $article = Article::where('slug', $slug)->firstOrFail();

    if ($article->thumbnail) {
        Storage::delete($article->thumbnail);
    }

    $article->delete();

    return redirect('/dashboard/article');
}


     public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
