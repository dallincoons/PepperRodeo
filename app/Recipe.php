<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\RecipeCategory;
use App\Traits\Itemable;

class Recipe extends Model
{
    use Itemable;

    private $foreignKey = 'recipe_id';

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function category()
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(GroceryList::class);
    }

    public function copyTo($user)
    {
        $recipeClone = $this->replicate();
        $recipeClone->user_id = $user->id;
        $recipeClone->save();
    }

    public function assignCategory($category_id)
    {
        $this->category_id = $category_id;

        $this->save();
    }
}
