<?php

use App\Http\Controllers\TorneoController;
use App\Http\Controllers\TorneoUsuarioController;
use App\Http\Controllers\UserController;
use Faker\Guesser\Name;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneoController::class, 'index'])->name('index');
Route::get('/torneo/delete/{id}', [TorneoController::class, 'delete'])->name('delete');


Route::get('/torneo/modifyForm/{id}', [TorneoController::class, 'modifyForm'])->name('modifyForm');
Route::put('/torneo/modify/{id}', [TorneoController::class, 'modify'])->name('modify');

Route::get('/torneo/create', [TorneoController::class, 'createForm'])->name('createForm');
Route::post('/torneo/create', [TorneoController::class, 'create'])->name('create');

Route::get('/torneo/{id}', [TorneoController::class, 'show'])->name('show');

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/toreno/setCookie',[UserController::class, 'setCookie'])->name('setCookie');
Route::get('/torneo/inscribirse/{torneo_id}',[TorneoUsuarioController::class, 'inscribirse'])->name('inscribirse');

