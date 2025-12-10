<?php

use App\Http\Controllers\TorneoController;
use App\Http\Controllers\TorneoUsuarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneoController::class, 'index'])->name('index');
Route::get('/torneo/delete/{id}', [TorneoController::class, 'delete'])->name('delete')->middleware(['checkLogin','checkAdmin']);


Route::get('/torneo/modifyForm/{id}', [TorneoController::class, 'modifyForm'])->name('modifyForm')->middleware(['checkLogin','checkAdmin']);
Route::put('/torneo/modify/{id}', [TorneoController::class, 'modify'])->name('modify');

Route::get('/torneo/create', [TorneoController::class, 'createForm'])->name('createForm')->middleware(['checkLogin','checkAdmin']);
Route::post('/torneo/create', [TorneoController::class, 'create'])->name('create');

Route::get('/torneo/{id}', [TorneoController::class, 'show'])->name('show');

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::get('/register', [UserController::class, 'registerForm'])->name('registerForm');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/torneo/setCookie',[UserController::class, 'setCookie'])->name('setCookie');
Route::get('/torneo/inscribirse/{torneo_id}',[TorneoUsuarioController::class, 'inscribirse'])->name('inscribirse')->middleware('checkLogin');

Route::get('/error/auth', function () {
    return view('errors.auth');
})->name('error.auth');
