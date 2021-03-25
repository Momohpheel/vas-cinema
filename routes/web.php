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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/movies', function () {
    return view('movies');
});

Route::get('/movies/showtime', function () {
    return view('showtime');
});

Route::get('/add-movies', function () {
    return view('addmovies');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\CinemaController::class, 'index'])->name('home');
