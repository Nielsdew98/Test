<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;

class Datatable extends Component
{
    public function render()
    {
        return view('livewire.datatable', [
            'recipes' => Recipe::visible()->paginate(15)
        ]);
    }
}
