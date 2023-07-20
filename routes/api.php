<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('recipes', 'App\Http\Controllers\RecipeController');
Route::resource('ingredients', 'App\Http\Controllers\IngredientController');

Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
Route::post('login', 'App\Http\Controllers\Auth\AuthController@login');
