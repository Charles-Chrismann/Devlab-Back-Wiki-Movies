<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public static function getMovieById($id)
    {
        // recup id d'une url 1324-nom-du-film

        $pureId = $id;
        return TmdbController::getMovieById($pureId);
    }

    public static function getFilteredMovies($queryStr, $sortBy)
    {
        $movies = TmdbController::getSearchedMovies($queryStr);
        // do stuff
        $filteredMovies = $movies;
        return $filteredMovies;
    }

    public static function getFilteredMoviesByGenre($genreId, $page)
    {
        $movies = TmdbController::getFilteredMoviesByGenre($genreId, $page);
        return $movies;
    }

    public static function getDiscoverMovies($queryParams){
        return TmdbController::getDiscoverMovies($queryParams);
    }
}
