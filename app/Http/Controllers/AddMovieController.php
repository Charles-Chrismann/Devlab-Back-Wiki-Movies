<?php

namespace App\Http\Controllers;


use App\Http\Controllers\SearchController;
use App\Models\Album;
use App\Models\Album_film;
use App\Models\User_album;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AddMovieController extends Controller
{

    public function addMoviePage($id){
        $movie = (new SearchController)->getMovieById($id);
        return Inertia::render('AddMovie',['film'=>$movie,'albums' => Album::getAllAlbum(session()->get('userID'))]);
    }

    public function addMovie(Request $request, $filmID){

        $request->validate(['album'=>'required']);

        if (Album::albumExist($request['album'])){

            if(User_album::isOwner(session()->get('userID'), $request['album'])){

                if(!Album_film::AlreadyExist($filmID, $request['album'])){

                    Album_film::addMovie($filmID,$request['album']);
                    return redirect()->route('myprofile')->with('message','Movie added successfully !');

                }else{
                    $res = "the movie is already in this album";
                }
            }else{
                $res = "You do not own this album";
            }
        }else{
            $res = "Unknow album";
        }


        $movie = (new SearchController)->getMovieById($filmID);
        return Inertia::render('AddMovie',['res'=>$res,'film'=>$movie,'albums' => Album::getAllAlbum(session()->get('userID'))]);

    }

}
