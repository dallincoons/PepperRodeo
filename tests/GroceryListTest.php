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
     * @group GroceryList
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
     * @group GroceryList
     * @test
     */
    public function adds_recipe_to_grocery_list()
    {
        $recipe = $this->createRecipe();

        $this->GroceryList->addRecipe($recipe);

        $this->assertTrue($this->GroceryList->recipes->contains($recipe));
    }

    /**
     * @group GroceryList
     * @test
     */
    public function adds_items_to_grocery_list()
    {
        $items = factory(Item::class, 3)->create();

        $this->GroceryList->addItems($items);

        $this->assertCount(3, $this->GroceryList->items);
    }

    /**
     * @group GroceryList
     * @test
     */
    public function copy_grocery_list_to_another_user()
    {
        $newUser = factory(User::class)->create();

        $this->GroceryList->copyTo($newUser);

        $this->assertCount(1, GroceryList::where('user_id', '=', $this->MainUser->id)->get());
        $this->assertCount(1, GroceryList::where('user_id', '=', $newUser->id)->get());
    }

    /**
     * @group GroceryList
     * @test
     */
    public function check_off_item()
    {
        $items = factory(Item::class, 3)->create();
        $this->GroceryList->addItems($items);

        $this->GroceryList->checkOffItem($items[2]);

        $this->assertEquals(1, $items[2]->isCheckedOff);
    }

    /**
     * @group GroceryList
     * @test
     */
     public function remove_item_from_grocery_list()
     {
         $items = factory(Item::class, 3)->create();
         $this->GroceryList->addItems($items);

         $this->GroceryList->removeItem($items[2]);

         $this->assertTrue(!$this->GroceryList->items->contains($items[2]));
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
