<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\GroceryList;
use App\User;
use App\Item;

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
        factory(Item::class)->create(['recipe_id' => $this->GroceryList->id]);
        $itemCount = $this->GroceryList->items()->get()->count();

        $this->GroceryList->addItem([
            'quantity' => 2,
            'name' => 'Ketchup'
        ]);

        $this->assertEquals(count($this->GroceryList->items()->get()), ($itemCount + 1));
    }
}
