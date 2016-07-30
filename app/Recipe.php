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
}
