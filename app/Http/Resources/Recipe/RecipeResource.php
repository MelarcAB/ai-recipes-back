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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'ingredients' => IngredientResource::collection($this->ingredients),
        ];
    }
}
