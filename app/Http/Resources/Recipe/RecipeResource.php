<?php

namespace App\Http\Resources\Recipe;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
//ingredient resource
use App\Http\Resources\Ingredients\IngredientResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'name' => $this->name,
            'steps' => json_decode($this->steps, true),
            'quantity' => $this->quantity,
            'image' => $this->image,
        ];
    }
}
