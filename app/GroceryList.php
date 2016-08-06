<?php

namespace App;

use App\Traits\Itemable;
use App\Traits\Copyable;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use Itemable, Copyable;

    private $foreignKey = 'grocery_list_id';

    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function addRecipe($recipe)
    {
        $this->recipes()->attach($recipe->id);
    }

    public function checkOffItem($item)
    {
        $item->isCheckedOff = 1;

        $item->save();
    }

    public function removeItem($item)
    {
        $this->items()->detach($item->id);
    }
}
