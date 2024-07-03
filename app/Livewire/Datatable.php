<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Recipe;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
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
