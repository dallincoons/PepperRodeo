<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PepperRodeo\GroceryLists\GroceryListPresenter;

class GroceryListPresenterProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(GroceryListPresenter $test)
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GroceryListPresenter', function(){
            return new GroceryListPresenter;
        });
    }
}
