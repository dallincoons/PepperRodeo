<?php

use Illuminate\Database\Seeder;
use App\RecipeCategory;

class RecipeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 8) as $index){

            RecipeCategory::create([
                'name' => $faker->name
            ]);

        }

    }
}
