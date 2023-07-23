<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\backend\MainController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\ArticleController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\FileManagerController;
use App\Http\Controllers\dashboard\DashboardController;

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

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout ', [LogoutController::class, 'logout']);
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::get('/dashboard', [MainController::class, 'index'])->middleware('auth');
Route::get('/dashboard/project/checkSlug', [ProjectController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/article/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/about', AboutController::class)->middleware('auth');
Route::resource('/dashboard/team', TeamController::class)->middleware('auth');
Route::resource('/dashboard/project', ProjectController::class)->middleware('auth');
Route::resource('/dashboard/article', ArticleController::class)->middleware('auth');
Route::resource('/dashboard/filemanager', FileManagerController::class)->middleware('auth');
Route::resource('/dashboard/service', ServiceController::class)->middleware('auth');
Route::get('/dashboard/filemanager/{fileManager}/download', [FileManagerController::class, 'download'])
    ->name('filemanager.download')->middleware('auth');
