<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //permitir si el usuario esta autenticado
        return $this->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            //puede contener ingredients[]
            'ingredients' => 'array',
            //cada ingrediente debe tener un slug de ingrediente
            'ingredients.*.slug' => 'required|string|max:255|exists:ingredients',
        ];
    }
}
