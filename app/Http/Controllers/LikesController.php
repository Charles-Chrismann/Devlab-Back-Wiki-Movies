<?php

namespace App\Http\Controllers;

use App\Models\Album_like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function unLike($albumID){
        Album_like::where('user_id', '=', session()->get('userID'))
            ->where('album_id', '=', $albumID)
            ->delete();
        return redirect()->route('myprofile');
    }
}
