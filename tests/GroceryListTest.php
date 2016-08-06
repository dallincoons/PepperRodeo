<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\GroceryList;
use App\User;
use App\Item;
use App\Recipe;

class GroceryListTest extends TestCase
{

    use DatabaseTransactions;

    private $MainUser;
    private $GroceryList;

    public function setUp()
    {
        parent::setUp();

        $this->MainUser = factory(User::class)->create();
        $this->GroceryList = factory(GroceryList::class)->create(['user_id' => $this->MainUser->id]);
    }

    /**
     * @test
     */
    public function add_item_to_recipe_from_array()
    {
        $this->createItem();
        $itemCount = $this->getItemCount();

        $this->GroceryList->addItem([
            'quantity' => 2,
            'name' => 'Ketchup'
        ]);

        $this->assertEquals($this->getItemCount(), ($itemCount + 1));
    }

    /**
     * @test
     */
    public function adds_recipe_to_grocery_list()
    {
        $recipe = $this->createRecipe();

        $this->GroceryList->addRecipe($recipe);

        $this->assertTrue($this->GroceryList->recipes->contains($recipe));
    }

    private function createItem()
    {
        return factory(Item::class)->create(['recipe_id' => $this->GroceryList->id]);
    }

    private function getItemCount()
    {
        return $this->GroceryList->items()->get()->count();
    }

    private function createRecipe()
    {
        return factory(Recipe::class)->create();
    }
}
