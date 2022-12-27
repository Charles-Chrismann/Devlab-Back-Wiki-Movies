<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function ProfileView(){

        $props = [
            'userDatas' => ['username' => 'username template', 'pp_url' => 'https://image.tmdb.org/t/p/original/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg'],
            'albums' => [
                ['name' => 'album1'],
                ['name' => 'album2'],
                ['name' => 'album3'],
                ['name' => 'album4'],
                ['name' => 'album5'],
                ['name' => 'album6'],
            ],
            'liked' => [
                ['name' => 'liked1'],
                ['name' => 'liked2'],
                ['name' => 'liked3'],
                ['name' => 'liked4'],
            ]
        ];
        return Inertia::render('UserProfile', $props);
    }
}
