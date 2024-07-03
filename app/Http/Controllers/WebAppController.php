<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WebAppController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function show(Recipe $recipe){
        if (null === ($suggested = Session::get('suggested'))){
            $suggestedRecipes = Recipe::visible()->where('id', '!=', $recipe->id)->forCategories([$recipe->category->id])->get()->random(4);
            Session::put('suggested', $suggestedRecipes);
            $suggested = Session::get('suggested');
        };

        return view('recipe', compact('recipe','suggested'));
    }
}
