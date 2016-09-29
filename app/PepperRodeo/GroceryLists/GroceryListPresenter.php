<?php


namespace App\PepperRodeo\GroceryLists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class GroceryListPresenter extends Model
{
    protected $items;

    protected $fillable = ['title', 'items', 'recipes'];

    public function __construct()
    {
        $this->items = new Collection;
    }

    function getItemsAttribute()
    {
        return collect($this->items);
    }

    public function addItem($item)
    {
        $this->items->add($item);

        return $this->items;
    }
}