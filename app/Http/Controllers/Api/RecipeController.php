<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function recipes(Request $request)
    {
        $query = Recipe::query();

        if ($search = $request->get('search')){
            $query = $query->search($search);
        }

        if($category = $request->get('category')){
            $query = $query->whereHas('category', function ($q) use ($category){
                $q->where('name', 'LIKE', "%{$category}%");
            });
        }

        $recipes = $query->where('is_hidden',false)->get();

        return new JsonResponse(['recipes' => RecipeResource::collection($recipes)]);
    }
}
