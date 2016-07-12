<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function copyTo($user)
    {
        $recipeClone = $this->replicate();
        $recipeClone->user_id = $user->id;
        $recipeClone->save();
    }
}
