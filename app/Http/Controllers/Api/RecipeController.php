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
        $query = Recipe::visible();
        if (null !== ($categories = $request->get('categories'))) {
            $query->forCategories(explode(',', $categories));
        }

        $recipes = $query
            ->search($request->get('search'))
            ->get();

        return new JsonResponse(['recipes' => RecipeResource::collection($recipes)]);
    }
}
