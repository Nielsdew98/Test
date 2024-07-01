<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //step 1 create categories
        $categories = Category::factory(10)->create();

        for ($i = 0; $i < 5; $i++){
          Recipe::factory()
              ->hasIngredients(random_int(0,10))
              ->count(100)
              ->create([
                  'category_id' => fake()->randomElement($categories)->id
              ]);
        }
    }
}
