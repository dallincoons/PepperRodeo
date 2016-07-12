<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Recipe;
use App\User;

class Article extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     * @test
     */
    public function copy_recipe_to_another_user()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $recipe = factory(Recipe::class)->create(['user_id' => $user->id]);
        $recipe->copyTo($user2);

        $this->assertCount(1, Recipe::where('user_id', '=', $user->id)->get());
        $this->assertCount(1, Recipe::where('user_id', '=', $user2->id)->get());
    }
}
