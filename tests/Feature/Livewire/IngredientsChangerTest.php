<?php

namespace Tests\Feature\Livewire;

use App\Livewire\IngredientsChanger;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class IngredientsChangerTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(IngredientsChanger::class)
            ->assertStatus(200);
    }

    /** @test */
    public function increment_servings()
    {
       $recipe = Recipe::factory()->create();
       $ingredient = Ingredient::factory()->recycle($recipe)->create();

        Livewire::test(IngredientsChanger::class)
            ->set('ingredients', [$ingredient])
            ->set('servings', 2)
            ->call('incrementServings')
            ->assertSet('servings', 3);
    }

    /** @test */
    public function decrement_servings()
    {
        $recipe = Recipe::factory()->create();
        $ingredient = Ingredient::factory()->recycle($recipe)->create();
        $updatedIngredient = $ingredient;
        $updatedIngredient->amount = $ingredient->amount * (1/2);
        $updatedIngredient->save();

        Livewire::test(IngredientsChanger::class)
            ->set('ingredients', [$ingredient])
            ->set('servings', 2)
            ->call('decrementServings')
            ->assertSet('servings', 1);
    }
}
