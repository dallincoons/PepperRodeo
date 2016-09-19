<?php namespace App\PepperRodeo\GroceryLists;

use App\Recipe;
use App\GroceryList;

class GroceryListManager
{
    protected $groceryList;

    public function __construct($groceryList, GroceryListBuilder $groceryListBuilder)
    {
        $this->groceryList = $groceryList;
        $this->groceryListBuilder = $groceryListBuilder;
    }

    public function addRecipe($recipe_id)
    {
        //@todo - check if recipe is already associated with grocery list?
        $recipe = Recipe::findOrFail($recipe_id);

        $this->groceryList->addRecipe($recipe);

        return 'yee haw';
    }

    public function addNewRecipe($title, $items)
    {
        $newRecipe = Recipe::create(['user_id' => \Auth::User()->getKey(), 'title' => $title]);
        $newRecipe->addItems($items);
        $this->groceryList->addRecipe($newRecipe);
    }
}