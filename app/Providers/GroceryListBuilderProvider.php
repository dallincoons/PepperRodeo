<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PepperRodeo\GroceryLists\GroceryListBuilder;

class GroceryListBuilderProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GroceryListBuilder $test)
    {
//        dd($this->app->GroceryListBuilder());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GroceryListBuilder', function(){
            return new GroceryListBuilder;
        });
    }
}
