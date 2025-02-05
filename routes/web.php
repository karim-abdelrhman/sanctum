<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/create' , function (){
    return view('create_user');
});

Route::post('/user/create' , [UserController::class , 'store'])->name('user.create');

Route::resource('posts' , \App\Http\Controllers\PostController::class);
Route::resource('users' , \App\Http\Controllers\UserController::class);
