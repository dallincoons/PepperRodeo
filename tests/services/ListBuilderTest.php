<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\PepperRodeo\GroceryLists\GroceryListBuilder;
use App\Item;
use App\Recipe;
use Illuminate\Database\Eloquent\Collection;

class ListBuilderTest extends TestCase
{
    use DatabaseTransactions;

    protected $ListBuilder;

    public function setUp()
    {
        parent::setUp();

        $this->ListBuilder = new GroceryListBuilder();
    }

    /**
     * A basic test example.
     *
     * @group ListBuilderTest
     * @test
     */
     public function combines_items_with_the_same_name_from_collection_of_times()
     {
        $recipe = factory(Recipe::class)->create();
        $recipe->items()->save(factory(Item::class)->create(['name' => 'tomato', 'quantity' => 4]));
        $recipe->items()->save(factory(Item::class)->create(['name' => 'Tomato', 'quantity' => 2]));
        $recipe->items()->save(factory(Item::class)->create(['name' => 'pickles', 'quantity' => 1]));
        $recipe->items()->save(factory(Item::class)->create(['name' => 'Pickles', 'quantity' => 3]));
        $recipe->items()->save(factory(Item::class)->create(['name' => 'nuts', 'quantity' => 1]));

        $recipe->items()->saveMany($this->getSampleItemCollection());

        $list = $this->ListBuilder->build($recipe->items);

        $pickles = $list->filter(function($value, $key){
            return ($value->name == 'pickles');
        });

         $tomatoes = $list->filter(function($value, $key){
             return ($value->name == 'tomato');
         })->first();

         $nuts = $list->filter(function($value, $key){
             return ($value->name == 'nuts');
         })->first();

         $this->assertCount(1, $pickles);
         $this->assertEquals(4, $pickles->first()->quantity);
         $this->assertEquals(6, $tomatoes->quantity);
         $this->assertEquals(1, $nuts->quantity);
     }

     private function getSampleItemCollection()
     {
        return factory(Item::class, 5)->create();
     }

}
