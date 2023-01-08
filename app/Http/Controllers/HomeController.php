<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function defaultHomeView(){
        return Inertia::render('Home', ['moviesByGenre' => self::moviesDiscoverGroupedByGenre()]);
    }

    public function moviesDiscoverGroupedByGenre() {
        $results = [];
        $genres = [
            [
                'id' => '28',
                'name' => 'Action'
            ],
            [
                'id' => '12',
                'name' => 'Adventure'
            ],
            [
                'id' => '16',
                'name' => 'Animation'
            ],
            [
                'id' => '14',
                'name' => 'Fantasy'
            ],
            [
                'id' => '27',
                'name' => 'Horror'
            ],
            [
                'id' => '9648',
                'name' => 'Mystery'
            ],
            [
                'id' => '878',
                'name' => 'Science Fiction'
            ],
            [
                'id' => '53',
                'name' => 'Thriller'
            ]
        ];
        foreach ($genres as $genre) {
            array_push($results, ['name' => $genre['name'], 'movies' => TmdbController::getFirstsMoviesByGenreId($genre['id'])]);
        }
        return $results;
    }
}
