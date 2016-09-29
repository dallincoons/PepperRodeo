<?php

use  App\PepperRodeo\GroceryLists\GroceryListPresenter;
use App\Item;
use App\Recipe;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GroceryListPresenterTest extends TestCase
{
    protected $presenter;

    public function setUp()
    {
        parent::setUp();

        $this->presenter = new GroceryListPresenter();
    }

    /**
     * @group grocery-list-presenter-tests
     * @return void
     * @test
     */
    public function adds_array_of_items_to_presenter()
    {
        $items = factory(Item::class, 5)->create();

        $this->presenter->addItems($items);

        $this->assertEquals($this->presenter->items, $items->toArray());

    }

    /**
     * @group grocery-list-presenter-tests
     * @return void
     * @test
     */
    public function adds_multiple_array_of_items_to_presenter()
    {
        $items = factory(Item::class, 5)->create();
        $items2 = factory(Item::class, 5)->create();

        $this->presenter->addItems($items);
        $this->presenter->addItems($items2);

        $this->assertCount(10, $this->presenter->items);

    }

    /**
     * @group grocery-list-presenter-tests
     * @return void
     * @test
     */
    public function adds_array_of_recipes_to_presenter()
    {
        $recipes = factory(Recipe::class, 5)->create();

        $this->presenter->addRecipes($recipes);

        $this->assertEquals($this->presenter->recipes, $recipes->toArray());

    }

    /**
     * @group grocery-list-presenter-tests
     * @return void
     * @test
     */
    public function adds_multiple_array_of_recipes_to_presenter()
    {
        $recipe = factory(Item::class, 5)->create();
        $recipe2 = factory(Item::class, 5)->create();

        $this->presenter->addRecipes($recipe);
        $this->presenter->addRecipes($recipe2);

        $this->assertCount(10, $this->presenter->recipes);

    }
}
