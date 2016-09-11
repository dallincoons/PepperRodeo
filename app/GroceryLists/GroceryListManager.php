<?php namespace App\GroceryLists;

use App\Recipe;

class GroceryListManager
{
    protected $groceryList;

    public function __construct($grocerylist)
    {
        $this->groceryList = $grocerylist;
    }

    public function addRecipe($recipe_id, $title = '', $items = [])
    {
        //@todo - check if recipe is already associated with grocery list?
        if($recipe_id === null || $recipe_id < 1)
        {
            $newRecipe = Recipe::create(['user_id' => \Auth::User()->getKey(), 'title' => $title]);
            $newRecipe->addItems($items);
            $this->groceryList->addRecipe($newRecipe);
            return;
        }

        $recipe = Recipe::findOrFail($recipe_id);

        $this->groceryList->addRecipe($recipe);

        return 'yee haw';
    }
}