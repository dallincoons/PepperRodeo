<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class Item extends Model
{
    protected $fillable = array('quantity', 'name', 'recipe_id');

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}
