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
        return $this->belongsTo(Recipe::class);
    }

    public function groceryList()
    {
        return $this->belongsToMany(GroceryList::class);
    }
}
