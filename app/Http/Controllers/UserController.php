<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Album_like;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function ProfileView($username){

        $infosUser = User::getUserPublicInfosByUsername($username);

        if(!$infosUser){
            abort(404);
        }

        if (session()->has('userID')) {
            $isLoggedin = true;
            $liked = Album_like::getAllLikes();
            $likedArray = [];
            foreach ($liked as $albumID){
                array_push($likedArray, $albumID['album_id']);
            }
        }else{
            $isLoggedin = false;
            $likedArray = null;
        }


        $props = [
            'userDatas' => $infosUser,
            'albums' => Album::getAlbum($infosUser['id']),
            'liked' => Album::getLikedAlbum($infosUser['id']),
            'log' => $isLoggedin,
            'logLiked' => $likedArray,
        ];
        return Inertia::render('UserProfile', $props);
    }
}
