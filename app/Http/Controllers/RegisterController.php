<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
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
            User::create([
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
            ]);
            return redirect()->route('login');
        }

    }
}
