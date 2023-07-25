<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use user resource
use App\Http\Resources\User\UserResource;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});



Route::resource('recipes', 'App\Http\Controllers\RecipeController')->middleware('auth:api');
Route::resource('ingredients', 'App\Http\Controllers\IngredientsController')->middleware('auth:api');

//recipecontroller post generateRecipe
Route::post('generate-recipe', 'App\Http\Controllers\RecipeController@generateRecipe')->middleware('auth:api');


Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
Route::post('login', 'App\Http\Controllers\Auth\AuthController@login');
Route::post('logout', 'App\Http\Controllers\Auth\AuthController@logout')->middleware('auth:api');
Route::post('set-openai-token', 'App\Http\Controllers\Auth\AuthController@setOpenaiToken')->middleware('auth:api');
