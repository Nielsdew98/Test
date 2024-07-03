<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Datatable;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DatatableTest extends TestCase
{
    use refreshDatabase, WithFaker;

    /** @test */
    public function display_all_recipes()
    {

        Recipe::factory()->count(10)->create(['is_hidden' => false]);

        Livewire::test(Datatable::class)
            ->assertViewHas('recipes', function ($recipes) {
                return count($recipes) == 10;
            });
    }

    /** @test */
    public function display_all_recipes_for_category()
    {
        $category = Category::factory()->count(2)->create();

        Recipe::factory()->count(5)->recycle($category->first())->create(['is_hidden' => false]);
        Recipe::factory()->count(5)->recycle($category->last())->create(['is_hidden' => false]);

        Livewire::withQueryParams(['categories' => [$category->first()->id]])
            ->test(Datatable::class)
            ->assertViewHas('recipes', function ($recipes) {
                return count($recipes) == 5;
            });
    }

    /** @test */
    public function display_all_recipes_for_search()
    {
        Recipe::factory()->create(['is_hidden' => false, 'name' => 'test']);
        Recipe::factory()->create(['is_hidden' => false, 'name' => 'random']);

        Livewire::withQueryParams(['search' => 'tes'])
            ->test(Datatable::class)
            ->assertViewHas('recipes', function ($recipes) {
                return count($recipes) == 1;
            });
    }
}
