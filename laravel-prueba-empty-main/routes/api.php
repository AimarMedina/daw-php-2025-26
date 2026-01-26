<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[UserController::class,'register']);
Route::delete('/user/{id}',[UserController::class,'destroy']);
Route::put('/user/{id}',[UserController::class,'update']);
Route::post('/login',[UserController::class,'login']);
Route::get('/user/{id}',[UserController::class,'show']);
Route::get('/user/{id}/preferences',[UserController::class,'getPreferences']);
Route::get('/user/{id}/tasks',[UserController::class,'getTasks']);
Route::get('/tasks/{id}/labels',[TaskController::class,'getLabels']);
