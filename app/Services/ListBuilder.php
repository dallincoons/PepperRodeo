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

            if(count($likeItems))
            {
                $newCollection->add($items->get($likeItems->first()->id));
                $items->forget($likeItems->first()->id);
                continue;
            }

            $newCollection->merge(self::combineMultipleLikeItems($items, $likeItems));

            foreach(self::combineMultipleLikeItems($items, $likeItems) as $item2)
            {
                $newCollection->add($item2);
            }

            $newCollection->add($item);

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
            return $value->name === $item->name && $item->id !== $value->id;
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
    private static function combineMultipleLikeItems($items, $likeItems)
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