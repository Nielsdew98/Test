<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Datatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DatatableTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {

        Livewire::test(Datatable::class)
            ->assertStatus(200);
    }
}
