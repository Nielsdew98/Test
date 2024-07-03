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

        $recipes = Recipe::visible()->forCategories($request->get('categories'))->search($request->get('search'))->get();

        return new JsonResponse(['recipes' => RecipeResource::collection($recipes)]);
    }
}
