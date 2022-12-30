<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function unLike($albumID){
        Album_like::where('user_id', '=', session()->get('userID'))
            ->where('album_id', '=', $albumID)
            ->delete();
        return back();
    }

    public function like($albumID){
        if(Album::albumExist($albumID)){
            if(!Album::isPrivate($albumID)){
                if(!Album_like::alreadyLike($albumID)){
                    Album_like::likeAlbum($albumID);
                }
            }
        }
        return back();
    }

}
