<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
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
            'email' => 'email|required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }


    //custom messages
    public function messages(): array
    {
        return [
            'password.required' => 'La contraseña es requerida',
        ];
    }
}
