<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PeliculaController::class, 'index'])->name('index');
Route::get('/pelicula/{id}', [PeliculaController::class, 'show'])->name('verMas');

Route::get('/login',[UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login',[UserController::class,'login'])->name('login');

Route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::post('/setLanguage',[LanguageController::class, 'setLanguage'])->name('setLanguage');

Route::get('/delete/{id}',[PeliculaController::class,'delete'])->name('delete')->middleware('checkAdmin');
Route::get('/modify/{id}',[PeliculaController::class,'modifyForm'])->name('modifyForm')->middleware('checkAdmin');
Route::put('/modify/{id}',[PeliculaController::class,'modify'])->name('modify')->middleware('checkAdmin');

Route::get('/create',[PeliculaController::class,'createForm'])->name('createForm')->middleware('checkAdmin');
Route::post('/create',[PeliculaController::class,'create'])->name('create')->middleware('checkAdmin');

Route::get('/error/notAdmin', function () {
    return view('error.noAdmin');
})->name('notAdmin');

Route::get('/error/notLogin', function () {
    return view('error.noLogin');
})->name('notLogin');
