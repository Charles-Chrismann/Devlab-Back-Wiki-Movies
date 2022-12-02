<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TmdbController extends Controller
{
    public static function getMovieById($id)
    {
        $client = new \GuzzleHttp\Client(array(
            'verify' => false,
        ));
        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/" . $id . "?api_key=" . $_ENV['TMDB_API_KEY']);
        return json_decode($response->getBody());
    }

    public static function getSearchedMovies($queryStr){
        $client = new \GuzzleHttp\Client(array(
            'verify' => false,
        ));
        $response = $client->request(
            'GET',
            "https://api.themoviedb.org/3/search/movie/?api_key="
            . $_ENV['TMDB_API_KEY']
            . "&query=" . $queryStr
        );
        return json_decode($response->getBody());
    }
}
