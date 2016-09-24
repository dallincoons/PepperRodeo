<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;
use App\GroceryList;

class Item extends Model
{
    protected $fillable = array('quantity', 'name', 'recipe_id', 'grocery_list_id');

    public function recipe()
    {
        return $this->morphedByMany(Recipe::class, 'itemable');
    }

    public function groceryList()
    {
        return $this->morphedByMany(GroceryList::class, 'itemable');
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}
