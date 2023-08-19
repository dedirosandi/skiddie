<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class InstagramShareController extends Controller
{
    //
    public function shareToInstagramStories(Request $request)
    {
        $image = $request->query(0);
        $body = $request->query(1);
        
        $imagePath = asset('storage/' . $image);
        
        // Gabungkan URL gambar dengan isi artikel body
        $content = urlencode($body . "\n\n" . $imagePath);

        // URL Scheme Instagram untuk cerita
        $instagramUrlScheme = "instagram-stories://share?backgroundImage=" . $content;

        // Redirect pengguna ke URL Scheme Instagram
        return Redirect::away($instagramUrlScheme);
    }
}

