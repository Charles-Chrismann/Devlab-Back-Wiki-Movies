<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Testing\Concerns\Has;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return Inertia::render('Login');
    }

    public function connection(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user !== null){
            if(Hash::check($request->password, $user->password)){
                session()->regenerate();
                session([
                    'userID'=>$user->id,
                    'username'=>$user->username,
                    'email'=>$user->email,
                    'profilePicture'=>$user->pp_url
                    ]);
                return redirect()->route('home');
            }else{
                $res = "Incorrect password";
            }
        }else{
            $res = "Unknown e-mail";
        }
        return Inertia::render('Login',["res"=>$res]);
    }

    public function logout(){
        session()->invalidate();
        return redirect()->route('connection');
    }
}
