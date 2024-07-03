<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Attributes\Session;
use Livewire\Component;

class SuggestedRecipes extends Component
{
    #[Session]
    public $suggested = [];
    public $recipe;

    public function render()
    {
        $this->getSuggestedRecipes();
        return <<<'HTML'
        <div>

        </div>
        HTML;
    }

    public function getSuggestedRecipes(){
        if (count($this->suggested) === 0) {
            $this->suggested = Recipe::visible()->where('id', '!=', $this->recipe->id)->forCategories([$this->recipe->category->id])->get()->random(4);
        }
    }
}
