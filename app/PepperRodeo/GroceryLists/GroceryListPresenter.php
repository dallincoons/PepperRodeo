<?php namespace App\PepperRodeo\GroceryLists;

use Illuminate\Database\Eloquent\Collection;
use App\Item;

class GroceryListPresenter
{
    protected $items;

    public function build($items)
    {
        $this->items = $items;

        $newCollection = new Collection();
        $this->mapNameToLowerCase();
        $this->items = $this->items->keyBy('id');

        foreach($this->items as $item)
        {
            $likeItems = $this->findLikeItems($item);

            foreach($this->combineLikeItems($likeItems) as $combinedItem)
            {
                $newCollection->add($combinedItem);
            }
        }

        return $newCollection;
    }

    protected function mapNameToLowerCase()
    {
        return $this->items->map(function($item, $key){
            $item->name  = strtolower($item->name);
            return $item;
        });
    }

    /**
     * @param $items
     * @param $item
     * @return mixed
     */
    protected function findLikeItems($item)
    {
        $items = $this->items;

        $likeItems = $items->filter(function ($value, $key) use ($item) {
                return strtolower($value->name) === strtolower($item->name);
        });
        return $likeItems;
    }

    /**
     * @param $items
     * @param $likeItems
     * @param $newCollection
     *
     * @return Collection
     */
    protected function combineLikeItems($likeItems)
    {
        $newCollection = new Collection();
        if(is_object($likeItems->first())) {
            $newCollection->add(new Item(['name' => $likeItems->first()->name, 'quantity' => $likeItems->sum('quantity')]));
        }

        foreach ($likeItems->pluck('id') as $id) {
            $this->items->forget($id);
        }

        return $newCollection;
    }
}