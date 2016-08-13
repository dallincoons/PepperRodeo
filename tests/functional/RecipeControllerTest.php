<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Recipe;
use App\User;
use App\Item;

class RecipeControllerTest extends TestCase
{
    use DatabaseTransactions;
    use testHelpers;

    protected $Recipes;
    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();

        $this->buildSampleRecipe();
    }

    /**
     * @group recipe-controller
     * @test
     */
    public function views_recipe_dashboard_and_views_links_for_recipes()
    {
        $firstRecipe = $this->Recipes->first();
        $lastRecipe = $this->Recipes->last();

        $this->visit('recipe')
             ->see($firstRecipe->title)
             ->see($lastRecipe->title);
    }

    /**
     * @group recipe-controller
     * @test
     */
    public function click_recipe_link_and_visit_individual_recipe_page()
    {
        $firstRecipe = $this->Recipes->first();

        $this->visit('recipe')
            ->click($firstRecipe->title)
            ->see($firstRecipe->title);
    }

    private function buildSampleRecipe()
    {
        $this->user->recipes()->save(factory(Recipe::class)->make());
        $this->Recipes = factory(Recipe::class, 3)
            ->create(['user_id' => $this->user->id])
            ->each(function($recipe){
                $recipe->items()->saveMany(factory(Item::class, 5)->make());
            });

    }
}