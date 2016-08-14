<?php

namespace App;

use App\Traits\Itemable;
use App\Traits\Copyable;
use Illuminate\Database\Eloquent\Model;

class GroceryList extends Model
{
    use Itemable, Copyable;

    private $foreignKey = 'grocery_list_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->morphMany(Item::class, 'itemable');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public function addRecipe($recipe)
    {
        $this->recipes()->attach($recipe->id);
    }
    public function removeRecipe($recipe)
    {
        $this->recipes()->detach($recipe);
    }

    public function checkOffItem($item)
    {
        $item->isCheckedOff = 1;

        $item->save();
    }

    public function removeItem($item)
    {
        $item->delete();
    }
}
