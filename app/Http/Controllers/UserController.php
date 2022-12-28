<?php

namespace App\Http\Controllers;

use App\Models\Album;
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


        $props = [
            'userDatas' => $infosUser,
            'albums' => Album::getAlbum($infosUser['id']),
            'liked' => Album::getLikedAlbum($infosUser['id'])
        ];
        return Inertia::render('UserProfile', $props);
    }
}
