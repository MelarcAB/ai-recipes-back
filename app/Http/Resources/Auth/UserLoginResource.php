<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //se recive el usuario y se retorna el token
        return [
            'name' => $this->name,
            'email' => $this->email,
            'open_ai_token' => $this->open_ai_token ? true : false,

        ];
    }
}
