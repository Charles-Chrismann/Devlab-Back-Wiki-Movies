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
        if($album['isDefault'] === 0){
            $album->delete();
            return redirect()->route('myprofile')->with('message','Album deleted !');
        }
        return redirect()->route('myprofile')->with('message',"You can't delete this album!");
    }

    public function albumCreate(Request $request){

        $request->validate([
            'name'=>'required|max:32|regex:/^[a-zÀ-ÿA-Z0-9\s]+$/',
        ]);
        $album = Album::create(['name'=>$request->name,'isPrivate'=>$request->isPrivate]);
        User_album::linkAlbum(session()->get('userID'), $album['id']);
        return redirect()->route('myprofile')->with('message','Album Created !');
    }


    public function albumEdit($albumID){
        if(Album::albumExist($albumID)){
            return Inertia::render('EditAlbum', ['album'=>Album::getThisAlbum($albumID)]);
        }
        abort(404);
    }
    public function  albumUpdate(Request $request, $albumID){
        if(Album::albumExist($albumID)){
            $album = Album::getThisAlbum($albumID);
            if(!empty($request['name'])){
                $request->validate([
                    'name'=>'max:32|regex:/^[a-zÀ-ÿA-Z0-9\s]+$/',
                ]);
                if ($request['isPrivate'] == $album['isPrivate']){
                    Album::where('id', '=', $albumID)->update(['name' => $request['name']]);
                }else{
                    Album::where('id', '=', $albumID)->update(['name' => $request['name'], 'isPrivate' => $request['isPrivate']]);
                }
            }else {
                if ($request['isPrivate'] != $album['isPrivate']){
                    Album::where('id', '=', $albumID)->update(['isPrivate' => $request['isPrivate']]);
                }
            }
            return redirect()->route('albumpage', $albumID);
        }
        abort(403);
    }

}
