<?php

use Illuminate\Database\Seeder;
use App\GroceryList;
use App\User;

class GroceryListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 4) as $index){

            GroceryList::create([
                'user_id' => 1,
                'title' => $faker->word
            ]);

        }
    }
}
