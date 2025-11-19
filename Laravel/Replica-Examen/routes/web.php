<?php

use App\Http\Controllers\TorneoController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneoController::class, 'index'])->name('index');
Route::get('/torneo/delete/{id}', [TorneoController::class, 'delete'])->name('delete');

Route::get('/torneo/modifyForm/{id}', [TorneoController::class, 'modifyForm'])->name('modifyForm');
Route::put('/torneo/modify/{id}', [TorneoController::class, 'modify'])->name('modify');

Route::get('/torneo/createForm', [TorneoController::class, 'createForm'])->name('createForm');
Route::post('/torneo/create', [TorneoController::class, 'create'])->name('create');

Route::get('/torneo/{id}', [TorneoController::class, 'show'])->name('show');

