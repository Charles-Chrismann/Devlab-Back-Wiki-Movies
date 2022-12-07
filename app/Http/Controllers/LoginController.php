<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

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

    }

    public function logout(){

    }
}
