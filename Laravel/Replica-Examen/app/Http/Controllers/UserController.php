<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //
    public function loginForm(){
        return view('auth/loginForm');
    }
    public function registerForm(){
        return view('auth/registerForm');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended();
    }

    public function register(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ], [
            'email.unique' => 'Este correo ya esta registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ]
        );

        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        return redirect()->route('loginForm')->with('status', 'Cuenta creada correctamente. Puedes iniciar sesión.');
    }


    public function setCookie(Request $request){
        $cookie = cookie('idioma', $request->idioma);
        Session::put('locale',$request->idioma);
        App::setLocale(request()->cookie('idioma', 'es'));
        return redirect()->intended('/')->withCookie($cookie);
    }
}
