<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories/{category?}', [HomeController::class, 'index'])->name('categories.filter');

//User resources
Route::resource('adverts', AdvertController::class)->except('delete');
Route::delete('adverts/{advert}', [AdvertController::class, 'destroy']);
Route::post('adverts/{advert}/comments', [AdvertController::class, 'comment'])->name('adverts.comment');

Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');

//Admin resources
Route::resource('categories', CategoryController::class)->middleware(['auth', 'admin']);
Route::resource('users', UserController::class)->middleware(['auth', 'admin'])->except(['create', 'store', 'update']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');

require __DIR__.'/auth.php';
