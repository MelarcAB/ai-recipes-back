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
//logs
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class RecipeController extends Controller
{

    //crud resource
    public function index(Request $request)
    {
        $user = $request->user();
        //recetas del usuario ordenadas por fecha de creacion descendente
        return (RecipeResource::collection($user->recipes->sortByDesc('created_at')));
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
            //return json
            return response()->json([
                'message' => '¡Receta creada correctamente!',
                'recipe' => new RecipeResource($recipe),
            ], 201);
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
            if (!$user->open_ai_token) {
                return response()->json([
                    'message' => "¡No se puede generar la receta porque el usuario no tiene token de OpenAI!",
                    'error' => "¡No se puede generar la receta porque el usuario no tiene token de OpenAI!"
                ], 409);
            }

            $token_openai = $user->open_ai_token;
            $ingredients = $request->ingredients;
            // Preparar prompt
            $ingredients_list = "";
            foreach ($ingredients as $ingredient) {
                $ingredients_list .= $ingredient['name'] . ", ";
            }

            $open_service = new OpenAiService($token_openai);
            // $recipe_type = "saludable";
            $prompt = "Ingredientes disponibles: $ingredients_list";

            //if isset arr 'params' in request
            $params = [];
            if (isset($request->params)) {
                $params = $request->params;
            }

            $response = $open_service->callGpt($prompt, $params);
            //pasar de string a json
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
            $recipe->steps = json_encode($response['instructions']);
            $recipe->quantity = $response['ingredients'];

            //if isset arr 'params' in request
            if (isset($params['tipo'])) {
                $recipe->type = $params['tipo'];
            }
            if (isset($params['dificultad'])) {
                $recipe->difficulty = $params['dificultad'];
            }

            $recipe->save();

            //asignar ingredientes
            foreach ($ingredients as $ingredient) {
                try {
                    $ingredient = Ingredients::where('name', $ingredient['name'])->firstOrFail();
                    $recipe->ingredients()->attach($ingredient->id);
                } catch (\Exception $e) {
                    continue;
                }
            }
            try {
                //generar la imagen, guardarla en el servidor y guardar la ruta en la receta
                $image = $open_service->callDalle($recipe->name);
                if ($image) {
                    $client = new Client();
                    $response = $client->get($image);

                    if ($response->getStatusCode() == 200) {
                        $filename = 'images/' . ($recipe->slug) . '_' . time() . '.jpg';
                        // Usa el sistema de archivos de Laravel para guardar la imagen en el disco 'public'
                        Storage::disk('public')->put($filename, $response->getBody());

                        // Actualiza la propiedad 'image' del objeto $recipe
                        $recipe->image = 'storage/' . $filename;
                    }
                    $recipe->save();
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }





            return response()->json([
                'message' => '¡Receta generada correctamente!',
                'recipe' => new RecipeResource($recipe),
                'ingredients' => $ingredients,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => '¡Error al intentar generar la receta!',
                'error' => $e->getMessage(),
            ], 409);
        }
    }



    function generateAlternative(Request $request)
    {
        //validar que lleva el slug de una receta y que la misma pertenece al usuario
        try {

            //validar que exista slug usando validate
            $request->validate([
                'slug' => 'required|exists:recipes,slug',
            ]);


            $user = $request->user();
            $recipe = Recipe::where('slug', $request->slug)->firstOrFail();

            // check if the recipe belongs to the user
            if ($recipe->user_id !== $user->id) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Validaciones
            if (!$user->open_ai_token) {
                return response()->json([
                    'message' => "¡No se puede generar la receta porque el usuario no tiene token de OpenAI!",
                    'error' => "¡No se puede generar la receta porque el usuario no tiene token de OpenAI!"
                ], 409);
            }

            $token_openai = $user->open_ai_token;
            $ingredients = $recipe->ingredients;
            // Preparar prompt
            $ingredients_list = "";
            foreach ($ingredients as $ingredient) {
                $ingredients_list .= $ingredient['name_es'] . ", ";
            }

            $open_service = new OpenAiService($token_openai);
            // $recipe_type = "saludable";
            $prompt = "Ingredientes disponibles: $ingredients_list";


            /**
             * marc.arino 20/08/2023
             * se debería rehacer el sistema de parámetros de la función principal, para que al llamar
             * a la función de generar receta, se le pasen los parámetros de la receta original
             *  type y difficulty estarán guardados en la receta, asi que de allí se podria sacar
             * Por ahora se dejará vacio solo con el param de alternative
             */
            $params = [
                'alternative' => $recipe->name
            ];

            $response = $open_service->callGpt($prompt, $params);
            //pasar de string a json
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
            $recipe->steps = json_encode($response['instructions']);
            $recipe->quantity = $response['ingredients'];
            $recipe->save();

            //asignar ingredientes
            foreach ($ingredients as $ingredient) {
                try {
                    $ingredient = Ingredients::where('name', $ingredient['name'])->firstOrFail();
                    $recipe->ingredients()->attach($ingredient->id);
                } catch (\Exception $e) {
                    continue;
                }
            }

            try {
                //generar la imagen, guardarla en el servidor y guardar la ruta en la receta
                $image = $open_service->callDalle($recipe->name);
                if ($image) {
                    $client = new Client();
                    $response = $client->get($image);

                    if ($response->getStatusCode() == 200) {
                        $filename = 'images/' . ($recipe->slug) . '_' . time() . '.jpg';
                        // Usa el sistema de archivos de Laravel para guardar la imagen en el disco 'public'
                        Storage::disk('public')->put($filename, $response->getBody());

                        // Actualiza la propiedad 'image' del objeto $recipe
                        $recipe->image = 'storage/' . $filename;
                    }
                    $recipe->save();
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }

            return response()->json([
                'message' => '¡Receta generada correctamente!',
                'recipe' => new RecipeResource($recipe),
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
