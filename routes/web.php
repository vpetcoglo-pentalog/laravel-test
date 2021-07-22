<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::resource('adverts', \App\Http\Controllers\AdController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class)->middleware(['auth', 'admin']);

Route::get(
    '/dashboard',
    [\App\Http\Controllers\DashboardController::class, 'index']
)
    ->middleware(['auth', 'admin'])->name('dashboard');

require __DIR__.'/auth.php';
