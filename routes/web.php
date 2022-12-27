<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use \App\Http\Controllers\DiscoverController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\RegisterController;
use \App\Http\Controllers\UserController;

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
})->name('home');

Route::get('/discover/', [DiscoverController::class, 'view']);

Route::get('/genres/{genreId}', function($genreId) {
    $movies = \App\Http\Controllers\MovieController::getFilteredMoviesByGenre($genreId, request('page'));
    return Inertia::render('ByGenre', ['movies' => $movies, 'currentUrl' => "/genres/" . $genreId]);
});

Route::get('/movie/{id}', function($id) {
    $movie = \App\Http\Controllers\MovieController::getMovieById($id);
    return Inertia::render('Movie', ['movie' => $movie]);
});

Route::get('/search/{queryStr}', function($queryStr) {
    $queryParams = [
        'query' => $queryStr,
        'sort_by' => request('sort_by') . request('order_by'),
    ];
    if(request('include_adult') !== null) $queryParams['include_adult'] = request('include_adult');
    $movies = \App\Http\Controllers\MovieController::getFilteredMovies($queryStr, $queryParams);
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

Route::get('/test', function() {
    return Inertia::render('Test', ["res"=>session('username')]);
})->name('test');


Route::get('login', [LoginController::class, 'login'])->name('login');

Route::post('login', [LoginController::class, 'connection'])->name('connection');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'register'])->name('register');

Route::post('register', [RegisterController::class, 'registerPost'])->name('register.post');

Route::get('user/{username}', [UserController::class, 'ProfileView']);
