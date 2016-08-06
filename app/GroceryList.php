<?php

namespace App;

use App\Traits\Itemable;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use Itemable;

    private $foreignKey = 'grocery_list_id';

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function addRecipe($recipe)
    {
        $this->recipes()->attach($recipe->id);
    }
}
