<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\backend\Article;

class SitemapController extends Controller
{
    //
    public function generateSitemap()
{
    $sitemap = Sitemap::create();

    // Tambahkan URL dinamis Anda ke dalam sitemap
    $articles = Article::all();
    foreach ($articles as $article) {
        $sitemap->add(Url::create(route('frontend.detail-article', $article))
            ->setLastModificationDate($article->updated_at)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));
    }

    return $sitemap->render('xml');
}
}
