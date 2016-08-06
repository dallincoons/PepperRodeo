<?php
namespace App\Traits;

use App\Item;

Trait Itemable
{
    public function addItem(array $data)
    {
        $data = array_merge($data, [$this->foreignKey => $this->id]);

        (new Item($data))->save();
    }
}