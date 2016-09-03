<?php

use Illuminate\Database\Seeder;
use App\Recipe;
use App\User;
use App\Item;

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

        foreach(range(1, 8) as $index){

            $recipe = Recipe::create([
                'user_id' => User::first()->getKey(),
                'title' => $faker->word
            ]);

            foreach(range(1, 9) as $itemindex)
            {
                $item = factory(Item::class)->create();
                $recipe->items()->save($item);
            }
        }
    }
}
