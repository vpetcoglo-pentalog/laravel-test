<?php

use App\Http\Controllers\AdvertController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::resource('adverts', AdvertController::class);
Route::resource('categories', CategoryController::class)->middleware(['auth', 'admin']);

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)
    ->middleware(['auth', 'admin'])->name('dashboard');

require __DIR__.'/auth.php';
