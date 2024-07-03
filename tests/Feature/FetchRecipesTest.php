<?php

namespace Tests\Feature;

use App\Http\Resources\RecipeResource;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchRecipesTest extends TestCase
{
    use RefreshDatabase;

    private Category $category;

    private Recipe $recipe;

    private Ingredient $ingredient;

    public function setUp(): void
    {
        parent::setUp();

        //create category
        $this->category = Category::create(['name' => fake()->name]);

        //create recipe
        $this->recipe = Recipe::factory()->recycle($this->category)->create(['is_hidden' => false]);

        //create ingredient
        $this->ingredient = Ingredient::factory()->recycle($this->recipe)->create();

    }

    public function test_it_can_retrieve_all_recipes(): void
    {

        $expectedResponse = json_encode([
            'recipes' => [RecipeResource::make($this->recipe)],
        ]);

        $response = $this->json('GET', '/api/recipes');

        $response->assertStatus(200);

        $this->assertSame($expectedResponse, $response->getContent());
    }
}
