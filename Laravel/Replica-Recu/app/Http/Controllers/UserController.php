<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function loginForm(){
        return view('auth.loginForm');
    }
    public function login(Request $req){
        $credentials = $req->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $req->session()->regenerate();

            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Este correo no existe',
            'password' => 'La contraseña no es correcta'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended();
    }
}
