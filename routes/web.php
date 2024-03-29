<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\backend\MainController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\EmailController;
use App\Http\Controllers\backend\ArticleController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\FileManagerController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\backend\PasswordManagerController;
use App\Http\Controllers\frontend\InstagramShareController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

// Route::resource('/', FrontendController::class);
Route::get('/', [FrontendController::class, 'Frontend'])->name('frontend');
Route::get('/detail-project/{slug}', [FrontendController::class, 'detailProject'])->name('forntend.detail-project');
Route::get('/detail-article/{slug}', [FrontendController::class, 'detailArticle'])->name('forntend.detail-article');
// Route::redirect('/{username}', '/profile/{username}');
Route::get('/{username}', [ProfileController::class, 'detailProfile']);
Route::post('/contact/send', [ContactController::class, 'send'])->name('send');
Route::get('/share/instagram', [InstagramShareController::class, 'shareToInstagramStories'])->name('share.instagram');


// Auth
Route::get('/login/admin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout ', [LogoutController::class, 'logout']);
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard/main', [MainController::class, 'index'])->middleware('auth');
Route::get('/dashboard/project/checkSlug', [ProjectController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/article/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth');

// Route::resource('/dashboard/message', BackendContactController::class)->middleware('auth');
// Route::get('', [BackendContactController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/email', EmailController::class)->middleware('auth');
Route::resource('/dashboard/about', AboutController::class)->middleware('auth');
Route::resource('/dashboard/team', TeamController::class)->middleware('auth');
Route::resource('/dashboard/project', ProjectController::class)->middleware('auth');
Route::resource('/dashboard/article', ArticleController::class)->middleware('auth');
Route::resource('/dashboard/password-manager', PasswordManagerController::class)->middleware('auth');
Route::resource('/dashboard/filemanager', FileManagerController::class)->middleware('auth');
Route::resource('/dashboard/service', ServiceController::class)->middleware('auth');
Route::resource('/dashboard/message', MessageController::class)->middleware('auth');
Route::get('/dashboard/filemanager/{fileManager}/download', [FileManagerController::class, 'download'])
    ->name('filemanager.download')->middleware('auth');

Route::get('sitemap.xml', 'SitemapController@generateSitemap');
