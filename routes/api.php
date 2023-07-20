<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('recipes', 'App\Http\Controllers\RecipeController')->middleware('auth:api');
Route::resource('ingredients', 'App\Http\Controllers\IngredientsController')->middleware('auth:api');

Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
Route::post('login', 'App\Http\Controllers\Auth\AuthController@login');
