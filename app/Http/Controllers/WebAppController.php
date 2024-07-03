<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class WebAppController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function show(Recipe $recipe){
        return view('recipe', compact('recipe'));
    }
}
