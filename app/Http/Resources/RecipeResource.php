<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'name' => $this->name,
            'category' => CategoryResource::make($this->category),
            'instructions' => $this->instructions,
            'duration' => $this->duration_minutes,
            'ingredients' => IngredientResource::collection($this->ingredients),
        ];
    }
}
