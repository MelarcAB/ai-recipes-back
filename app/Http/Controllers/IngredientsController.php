<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredients;
use App\Http\Resources\Ingredients\IngredientResource;
use Illuminate\Support\Facades\Log;

class IngredientsController extends Controller
{

    /**
     * MelarcAB 20/07/2023
     * Por ahora se dejarán algunos métodos como NO implementados porque no se deberán poder tratar desde el front, estos datos no deberían tocarse nunca.
     * De todas formas en un futuro se podrían implementar para poder hacer un CRUD completo usando roles de usuario.
     * De esta forma un usuario con rol de administrador podría hacer un CRUD completo.
     */

    public function index()
    {
        //log a custom
        Log::channel('custom')->info('IngredientsController@index');
        return IngredientResource::collection(Ingredients::all());
    }

    public function store(Request $request)
    {
        //metodo no implementado
        return response()->json(null, 204);
    }

    public function show($slug)
    {
        try {
            $ingredient = Ingredients::where('slug', $slug)->firstOrFail();
            return new IngredientResource($ingredient);
        } catch (\Exception $e) {
            return response()->json([
                'message' => '¡Ingrediente no encontrado!',
                // 'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        /*   $ingredient = Ingredients::findOrFail($id);
        $ingredient->update($request->all());
        return response()->json($ingredient, 200);*/

        //metodo no implementado
        return response()->json(null, 204);
    }

    public function delete(Request $request, $id)
    {
        /*  $ingredient = Ingredients::findOrFail($id);
        $ingredient->delete();
        return response()->json(null, 204);*/
        //metodo no implementado
        return response()->json(null, 204);
    }
}
