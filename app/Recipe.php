<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Recipe extends Model
{

    public function items()
    {
        return $this->hasMany(Item::class);
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

    public function assignCategory()
    {

    }
}
