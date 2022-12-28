<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MyProfileController extends Controller
{
    public function MyProfile(){

        $props = [
            'userDatas' => [
                            'username'=>session()->get('username'),
                            'email'=>session()->get('email'),
                            'pp_url'=>session()->get('profilePicture')
                            ],

            'albums' => Album::getAllAlbum(session()->get('userID')),
            'liked' => Album::getLikedAlbum(session()->get('userID'))
        ];
        return Inertia::render('MyProfile', $props);
    }

}
