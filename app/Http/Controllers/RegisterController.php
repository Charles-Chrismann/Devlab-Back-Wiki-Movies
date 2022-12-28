<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Album;
use App\Models\User_album;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register(){
        return Inertia::render('Register');
    }

    public function registerPost(Request $request){
        if($request->validate([
            'username' => ['required','max:16', 'unique:App\Models\User,username', 'alpha_dash'] ,
            'email' => ['required', 'email:rfc,dns', 'max:255', 'unique:App\Models\User,email'],
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => ['required'],
        ])){
            $user = User::create([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'pp_url'=>"https://ui-avatars.com/api/?background=242424&color=42D392&name="."$request->username"."&size=256",
            ]);

            $watched = Album::create([
                        'isPrivate' => 0,
                        'name' => 'Watched',
                    ]);

            $ptw = Album::create([
                'isPrivate' => 0,
                'name' => 'Plan to watch',
            ]);

            foreach ([$watched, $ptw] as $album){
                User_album::linkAlbum($user['id'], $album['id']);
            }

            return redirect()->route('login')->with('message','Account created you can login now');
        }

    }
}
