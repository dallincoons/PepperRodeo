<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Item;
use App\Http\Requests\CreateRecipeRequest;
use JavaScript;
use App\Http\Requests;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $recipes = $user->recipes;

        return view('recipes.show-all-recipes', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \Auth::user()->recipeCategories()->get();

        Javascript::put(['categories' => $categories->toArray()]);

        return view('recipes.add-recipe', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecipeRequest $request)
    {
        $recipe = Recipe::create([
            'user_id' => \Auth::user()->getKey(),
            'title' => $request->title,
            'directions' => $request->directions,
        ]);
        $recipe->category()->associate($request->category);
        foreach($request->input('recipeFields') as $itemJson)
        {
            $item = Item::create($itemJson);

            $recipe->items()->save($item);

        }

        return redirect('/recipe/' . $recipe->getKey());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $listsWithoutRecipe = \Auth::user()->groceryLists->filter(function($grocerylist, $key) use($recipe){
            return($grocerylist->recipes()->where('id', $recipe->getKey())->count() === 0);
        });

        return view('recipes.single-recipe', compact('recipe', 'listsWithoutRecipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit-single', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
