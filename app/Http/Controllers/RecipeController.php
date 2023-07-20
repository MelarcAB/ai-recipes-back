<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Recipe\RecipeResource;
use App\Models\Recipe;

//reciperequest
use App\Http\Requests\Recipe\RecipeStoreRequest;
use App\Services\Helper\SlugGenerator;

//user
use App\Models\User;
//ingredients
use App\Models\Ingredients;

class RecipeController extends Controller
{

    //crud resource
    public function index(Request $request)
    {
        $user = $request->user();
        //recetas del usuario
        return (RecipeResource::collection($user->recipes));
    }

    public function store(RecipeStoreRequest $request)
    {
        try {
            $user = $request->user();
            $recipe = new Recipe();
            $recipe->fill($request->all());
            $recipe->slug = SlugGenerator::generateUniqueSlug(Recipe::class, $recipe->name);
            $recipe->user_id = $user->id;

            $recipe->save();

            // get ingredients by slug
            $ingredients = Ingredients::whereIn('slug', collect($request->ingredients)->pluck('slug'))->get();

            // sync ingredients with the recipe
            $recipe->ingredients()->sync($ingredients->pluck('id')->toArray());
            return RecipeResource::make($recipe);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error on save!',
                'error' => $e->getMessage(),
            ], 404);
        }
    }


    public function show(Request $request, $slug)
    {
        $user = $request->user();
        $recipe = Recipe::where('slug', $slug)->firstOrFail();

        // check if the recipe belongs to the user
        if ($recipe->user_id !== $user->id) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return new RecipeResource($recipe);
    }

    //destroy
    public function destroy(Request $request, $slug)
    {
        try {
            $user = $request->user();
            $recipe = Recipe::where('slug', $slug)->firstOrFail();

            // check if the recipe belongs to the user
            if ($recipe->user_id !== $user->id) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $recipe->delete();


            //return json deleted correctly
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => '¡Receta no encontrada!',
                // 'error' => $e->getMessage(),
            ], 404);
        }
    }
}
