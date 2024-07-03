<?php

use App\Http\Controllers\WebAppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebAppController::class, 'index'])->name('home');
Route::get('/{recipe}', [WebAppController::class, 'show'])->name('recipe.show');
