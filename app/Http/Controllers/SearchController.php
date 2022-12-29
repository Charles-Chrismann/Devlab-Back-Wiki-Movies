<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($queryStr) {
        $client = new \GuzzleHttp\Client(array(
            'verify' => false,
        ));
        $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie/?api_key=".env('TMDB_API_KEY')."&query=" . $queryStr);
        return json_decode($response->getBody())->results;
    }

    public function getMovieById($id){
        $client = new \GuzzleHttp\Client(array(
            'verify' => false,
        ));
        $response = $client->request('GET', "https://api.themoviedb.org/3/movie/".$id."?api_key=".env('TMDB_API_KEY'));
        return json_decode($response->getBody());
    }
}
