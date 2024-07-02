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

        if($categories = $request->get('category')){
            $categories = explode(",", $categories);

            $query = $query->whereHas('category', function ($q) use ($categories){
                $q->whereIn('name',$categories);
            });
        }

        $recipes = $query->where('is_hidden',false)->get();

        return new JsonResponse(['recipes' => RecipeResource::collection($recipes)]);
    }
}
