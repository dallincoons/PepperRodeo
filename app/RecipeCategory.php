<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class RecipeCategory extends Model
{
    protected $fillable = ['name'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
