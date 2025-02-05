<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\checkLocaleForApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
//Route::group([
//    'prefix' => 'auth'
//], function () {
//    Route::post('login', [AuthController::class , 'login']);
//    Route::post('register', [AuthController::class , 'register']);
//    Route::post('logout', [AuthController::class , 'logout']);
//    Route::post('refresh', [AuthController::class , 'refresh']);
//    Route::post('me', [AuthController::class , 'me']);
//});

Route::post('login' , [AuthController::class , 'login']);
Route::post('logout' , [AuthController::class , 'logout'])->middleware('auth:sanctum');;

Route::resource('posts' , PostController::class)->middleware(['auth:sanctum',checkLocaleForApi::class]);
Route::resource('users' , UserController::class);
