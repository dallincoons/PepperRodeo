<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\Item;
use App\RecipeCategory;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $cnt = RecipeCategory::count();
        if ($cnt == 0)
            return;



        foreach(range(1, 8) as $index){
            $randIndex = rand(0, $cnt-1);
            
            $recipe = Recipe::create([
                'user_id' => 1,
                'title' => $faker->word,
                'recipe_category_id' => RecipeCategory::skip($randIndex)->take(1)->first()->getKey()
            ]);

            foreach(range(1, 9) as $itemindex)
            {
                $item = factory(Item::class)->create();
                $recipe->items()->save($item);
            }
        }
    }
}
