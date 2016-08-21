<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Services\ListBuilder;
use App\Item;
use Illuminate\Database\Eloquent\Collection;

class ListBuilderTest extends TestCase
{
    protected $ListBuilder;

    public function setUp()
    {
        parent::setUp();

        $this->ListBuilder = new ListBuilder();
    }

    /**
     * A basic test example.
     *
     * @group ListBuilderTest
     * @test
     */
     public function combines_items_with_the_same_name_from_collection_of_times()
     {
        $itemCollection = new Collection;
        $itemCollection->add(factory(Item::class)->create(['name' => 'tomato', 'quantity' => 4]));
        $itemCollection->add(factory(Item::class)->create(['name' => 'Tomato', 'quantity' => 2]));
        $itemCollection->add(factory(Item::class)->create(['name' => 'pickles', 'quantity' => 1]));
        $itemCollection->add(factory(Item::class)->create(['name' => 'Pickles', 'quantity' => 3]));
        $itemCollection->add(factory(Item::class)->create(['name' => 'nuts', 'quantity' => 1]));

        $items = $this->getSampleItemCollection($itemCollection);

        $list = ListBuilder::build($items);

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

     private function getSampleItemCollection($itemCollection)
     {
        return factory(Item::class, 5)->create()->merge($itemCollection);
     }

}
