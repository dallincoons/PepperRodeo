<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class RecipeCategory extends Model
{
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
