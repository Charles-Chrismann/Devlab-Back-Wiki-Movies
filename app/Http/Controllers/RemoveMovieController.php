<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_film;
use App\Models\User_album;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RemoveMovieController extends Controller
{
    public function AlbumPage($albumID){
        $moviesIDs = Album_film::getAllMoviesFromAlbum($albumID);
        $movies = [];

        $owner = false;
        if(User_album::isOwner(session('userID'), $albumID)){
            $owner = true;
        }

        if(count($moviesIDs)>0){
            foreach($moviesIDs as $id){
                array_push($movies, (new SearchController)->getMovieById($id["movie_id"]));
            }
        }
        return Inertia::render('Album',['owner'=>$owner,'movies'=>$movies,'albumInfos' => Album::getThisAlbum($albumID)]);
    }

    public function removeMovie($albumID, $movieID){
        if(User_album::isOwner(session('userID'), $albumID)){
            Album_film::where('movie_id', '=', $movieID)
                ->where('album_id', '=', $albumID)
                ->delete();
        }
        return back();
    }
}
