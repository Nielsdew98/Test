<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SuggestedRecipes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SuggestedRecipesTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(SuggestedRecipes::class)
            ->assertStatus(200);
    }
}
