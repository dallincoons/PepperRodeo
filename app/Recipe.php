<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\RecipeCategory;

class Recipe extends Model
{

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function category()
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function copyTo($user)
    {
        $recipeClone = $this->replicate();
        $recipeClone->user_id = $user->id;
        $recipeClone->save();
    }

    public function addItem(array $data)
    {
        $data = array_merge($data, ['recipe_id' => $this->id]);

        (new Item($data))->save();
    }

    public function assignCategory($category_id)
    {
        $this->category_id = $category_id;

        $this->save();
    }
}
