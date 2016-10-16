<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemCategory;
use Illuminate\Http\Request;
use App\GroceryList;
use App\PepperRodeo\GroceryLists\GroceryListPresenterBuilder;
use App\Recipe;
use JavaScript;

class GroceryListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $grocerylists = $user->groceryLists;

        return view('grocerylists.all-grocery-lists', compact('grocerylists'));
    }

    /**
     * Show grocery list manager view
     */
    public function manage(Request $request, GroceryList $grocerylist, Recipe $recipe)
    {
        $recipes[] = $recipe;

        return view('grocerylists.manage', compact('grocerylist', 'recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = \Auth::user()->recipes()->with('items')->get();

        JavaScript::put(['recipes' => $recipes->keyBy('id')]);

        return view('grocerylists.create-grocery-list', compact('recipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = [];

        $grocerylist = GroceryList::create(['user_id' => \Auth::user()->getKey(), 'title' => $request->title]);

        foreach($request->input('items') as $itemJson)
        {
            $items[] = Item::create($itemJson);
        }

        return view('grocerylists.manage', compact('grocerylist', 'items'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GroceryList $grocerylist, GroceryListPresenterBuilder $listBuilder)
    {
        $grocerylist = $listBuilder->build($grocerylist);

        return view('grocerylists.single-grocery-list', compact('grocerylist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @PUT/PATCH
     */
    public function update(Request $request, GroceryList $grocerylist)
    {
        if($itemIds = $request->input('items')){
            $itemIds = array_keys($request->input('items'));
        }

        $items = Item::find($itemIds);

        $grocerylist->items()->saveMany($items);

        return view('grocerylists.single-grocery-list', compact('grocerylist'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
