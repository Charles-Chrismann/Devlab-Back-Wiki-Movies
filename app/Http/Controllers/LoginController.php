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
                return Inertia::render('Test',["res"=>"Nice !"]);
            }else{
                $res = "Incorrect password";
            }
        }else{
            $res = "Unknown e-mail";
        }
        return Inertia::render('Login',["res"=>$res]);
    }

    public function logout(){

    }
}
