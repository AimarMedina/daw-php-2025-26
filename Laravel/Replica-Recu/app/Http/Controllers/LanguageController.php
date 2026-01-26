<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function setLanguage(Request $req){
        $req->validate([
            'idioma'=>['required','in:es,eu']
        ]);
        Session::put('locale',$req->idioma);
        return redirect()->back();
    }
}
