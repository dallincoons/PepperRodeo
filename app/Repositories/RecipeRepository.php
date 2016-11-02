<?php
namespace App\Repositories;

use App\Recipe;
use App\Item;

class RecipeRepository
{
    public static function recipesWithCategories()
    {
        $recipesWithCategories = [];
        foreach(Recipe::where('user_id', \Auth::user()->getKey())->with('category')->get() as $recipe)
        {
            $category = $recipe->category->name;
            if(!isset($recipesWithCategories[$category])){
                $recipesWithCategories[$category] = [];
            }
            array_push($recipesWithCategories[$category], $recipe);
        }

        return $recipesWithCategories;
    }

    public static function updateRecipe($recipe, $recipeData)
    {
        $recipe->title = $recipeData['title'];
        $recipe->recipe_category_id = $recipeData['category'];
        $recipe->directions = $recipeData['directions'];

        if($recipe->isDirty()){
            $recipe->save();
        }
    }

    public static function updateRecipeItems($recipe, $recipeFields)
    {
        $recipeFields = collect($recipeFields);
        $goodIds = $recipe->items->pluck('id')->diff($recipeFields->pluck('id'));
        $deleteIds = $recipe->items->pluck('id')->diff($goodIds);

        Item::destroy($deleteIds->toArray());

        foreach($recipe->items->whereIn('id', $goodIds->toArray()) as $itemJson)
        {
            $item = Item::find($itemJson['id']);
            if(!$item || !$recipe->items->contains($item->id)){
                $item = new Item();
            }

            $item->quantity = $itemJson['quantity'];
            $item->type = $itemJson['type'];
            $item->name = $itemJson['name'];
            $item->item_category_id = $itemJson['item_category_id'];

            if($item->isDirty()){
                $recipe->items()->save($item);
            }
        }
    }
}
