<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'category_id' => Category::factory(),
            'name' => $this->faker->name(),
            'instructions' => $this->faker->text(),
            'duration_minutes' => random_int(0,200),
            'is_hidden' => $this->faker->boolean(),
        ];
    }
}
