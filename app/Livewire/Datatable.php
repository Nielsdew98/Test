<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    public $search = '';

    public $categories = [];
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.datatable', [
            'recipes' => Recipe::visible()->forCategories($this->categories)->search($this->search)->paginate(15),
            'filterCategories' => Category::all(),
        ]);
    }
}
