<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

Route::get('articulos', [ArticuloController::class, 'index'])->name('articulos');
Route::get('articulos/create', [ArticuloController::class, 'create'])->name('formulario');
Route::get('articulos/{id}', [ArticuloController::class, 'show'])->name('mostrar');
Route::post('articulos/', [ArticuloController::class, 'store'])->name('insertar');
