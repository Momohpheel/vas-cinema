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

Route::get('/', [App\Http\Controllers\CinemaController::class, 'viewMovies']);
Route::get('/movie/showtime/{id}', [App\Http\Controllers\CinemaController::class, 'view']);
Route::get('/add-movies', [App\Http\Controllers\CinemaController::class, 'getAddMoviesPage']);
Route::post('/add-movies', [App\Http\Controllers\CinemaController::class, 'addMovies'])->name('movie');
Route::get('/home', [App\Http\Controllers\CinemaController::class, 'index'])->name('home');
Auth::routes();

