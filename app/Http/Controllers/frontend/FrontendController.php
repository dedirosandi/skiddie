<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\backend\About;
use App\Models\backend\Article;
use App\Models\backend\Project;
use App\Models\backend\Service;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function Frontend()
    {
        $abouts = About::first();
        $teams = User::all();
        $projects = Project::all();
        $articles = Article::all();
        $services = Service::all();

        return view('frontend.index', compact('teams', 'projects', 'articles', 'abouts', 'services'));
    }

    public function detailProject($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if (!$project) {
            abort(404); // Tampilkan halaman 404 jika project tidak ditemukan
        }

        return view('frontend.detail-project', compact('project'));
    }
    public function detailArticle($slug)
    {
        $all_article = Article::all();
        $article = Article::where('slug', $slug)->first();

        if (!$article) {
            abort(404); // Tampilkan halaman 404 jika project tidak ditemukan
        }

        return view('frontend.detail-article', compact('article', 'all_article'));
    }
}
