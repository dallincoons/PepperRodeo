<?php namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Item;

class ListBuilder
{
    protected $items;

    public static function build($items)
    {
        $newCollection = new Collection();
        $items = static::mapNameToLowerCase($items);
        $items = $items->keyBy('id');

        foreach($items as $item)
        {
            $likeItems = static::findLikeItems($items, $item);

            foreach(self::combineLikeItems($items, $likeItems) as $combinedItem)
            {
                $newCollection->add($combinedItem);
            }
        }
        return $newCollection;
    }

    protected static function mapNameToLowerCase($items)
    {
        return $items->map(function($item, $key){
            $item->name  = strtolower($item->name);
            return $item;
        });
    }

    /**
     * @param $items
     * @param $item
     * @return mixed
     */
    private static function findLikeItems($items, $item)
    {
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
    private static function combineLikeItems($items, $likeItems)
    {

        $newCollection = new Collection();

        if(is_object($likeItems->first())) {
            $newCollection->add(new Item(['name' => $likeItems->first()->name, 'quantity' => $likeItems->sum('quantity')]));
        }

        foreach ($likeItems->pluck('id') as $id) {
            $items->forget($id);
        }

        return $newCollection;
    }
}