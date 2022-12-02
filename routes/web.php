<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function() {
    return Inertia::render('Hw');
});

Route::get('/login', function() {
    return Inertia::render('Welcome');
});

Route::get('/movie/{id}', function($id) {
    $movie = \App\Http\Controllers\MovieController::getMovieById($id);
    return Inertia::render('Movie', ['movie' => $movie]);
});

Route::get('/search/{queryStr}', function($queryStr) {
    $movies = \App\Http\Controllers\MovieController::getFilteredMovies($queryStr, request('sort_by'));
    return Inertia::render('Search', ['movies' => $movies]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
