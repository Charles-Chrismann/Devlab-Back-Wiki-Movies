<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($queryStr) {
        $client = new \GuzzleHttp\Client(array(
            'verify' => false,
        ));
        $response = $client->request('GET', "https://api.themoviedb.org/3/search/movie/?api_key=b3faa911f948bc3b10f344bcd13a51b5&query=" . $queryStr);
        return json_decode($response->getBody())->results;
    }
}
