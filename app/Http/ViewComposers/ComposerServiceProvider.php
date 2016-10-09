<?php

namespace App\Http\ViewComposers;

use App\ItemCategory;
use App\RecipeCategory;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(['recipes.add-recipe', 'grocerylists.create-grocery-list'], function($view){
            $itemCategories = ItemCategory::all();
            $view->with('itemCategories', $itemCategories);
        });

        \View::composer(['recipes.show-all-recipes'], function($view){
            $recipeCategories = RecipeCategory::all()->pluck('name', 'id');
            $view->with('recipeCategories', $recipeCategories);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
