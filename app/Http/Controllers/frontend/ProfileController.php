<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function detailProfile($username)
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        // return view('backend.article.index', ['articles' => Article::orderBy('created_at', 'desc')->get()]);
        $username = User::where('username', $username)->first();

        if (!$username) {
            abort(404); // Tampilkan halaman 404 jika project tidak ditemukan
        }

        return view('frontend.detail-profile', compact('username', 'projects'));
    }
}
