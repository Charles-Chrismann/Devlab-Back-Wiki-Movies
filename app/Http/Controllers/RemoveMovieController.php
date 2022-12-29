<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_film;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RemoveMovieController extends Controller
{
    public function deleteMoviePage($albumID){
        $moviesIDs = Album_film::getAllMoviesFromAlbum($albumID);
        $movies = [];
        if(count($moviesIDs)>0){
            foreach($moviesIDs as $id){
                array_push($movies, (new SearchController)->getMovieById($id["movie_id"]));
            }
        }
        return Inertia::render('RemoveMovie',['movies'=>$movies,'albumInfos' => Album::getThisAlbum($albumID)]);
    }
}
