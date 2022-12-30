<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_like;
use App\Models\User_album;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlbumController extends Controller
{

    public function newAlbum(){
        return Inertia::render('NewAlbum');
    }
    public function albumDelete(Album $album){
        $album->delete();
        return redirect()->route('myprofile')->with('message','Album deleted !');
    }

    public function albumCreate(Request $request){

        $request->validate([
            'name'=>'required|max:32|regex:/^[a-zÀ-ÿA-Z0-9\s]+$/',
        ]);
        $album = Album::create(['name'=>$request->name,'isPrivate'=>$request->isPrivate]);
        User_album::linkAlbum(session()->get('userID'), $album['id']);
        return redirect()->route('myprofile')->with('message','Album Created !');
    }

}
