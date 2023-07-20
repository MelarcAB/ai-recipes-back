<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;

class RecipeController extends Controller
{

    //crud resource
    public function index(Request $request)
    {
        $user = $request->user();
        //recetas del usuario
        return (RecipeResource::collection($user->recipes));
    }
}
