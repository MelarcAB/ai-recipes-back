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

use App\Services\OpenAiService;

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



    function generateRecipe(Request $request)
    {
        try {
            // Validaciones

            $user = $request->user();
            $ingredients = $request->ingredients;
            //convertir a array
            $ingredients = ($ingredients);



            // Preparar prompt
            $ingredients_list = "";
            foreach ($ingredients as $ingredient) {
                $ingredients_list .= $ingredient['name'] . ", ";
            }

            $open_service = new OpenAiService();
            $recipe_type = "saludable";
            $prompt = "Receta de cocina $recipe_type con los siguientes ingredientes: $ingredients_list";

            $response = $open_service->callGpt($prompt);
            //validar si response es json
            $response = json_decode($response, true);
            //validar si response tiene name, nutritional_values, ingredients, instructions
            if (!isset($response['name']) || !isset($response['nutritional_values']) || !isset($response['ingredients']) || !isset($response['instructions'])) {
                return response()->json([
                    'message' => '¡Error generando receta!',
                    'error' => '¡Error generando receta!',
                ], 409);
            }

            //guardar receta
            $recipe = new Recipe();
            $recipe->user_id = $user->id;
            $recipe->name = $response['name'];
            $recipe->slug = SlugGenerator::generateUniqueSlug(Recipe::class, $recipe->name);
            //pasar instrucciones a string
            $recipe->steps = json_encode($response['instructions']);
            //quantity
            $recipe->quantity = $response['ingredients'];

            //save
            $recipe->save();


            return response()->json([
                'message' => '¡Receta generada correctamente!',
                'recipe' => $response,
                'ingredients' => $ingredients,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => '¡Error al intentar generar la receta!',
                'error' => $e->getMessage(),
            ], 409);
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
