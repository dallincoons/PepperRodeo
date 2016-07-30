<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class Item extends Model
{
    public function recipe(){
        return $this->belongsTo('App\Recipe');
    }
}
