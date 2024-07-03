<?php

namespace Tests\Feature\Livewire;

use App\Livewire\IngredientsChanger;
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
}
