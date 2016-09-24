<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function() {

    Route::auth();

    Route::get('/', 'HomeController@index');

});

Route::group(['middleware' => ['web', 'auth']], function(){

    Route::resource('recipe', 'RecipeController');

    Route::get('/grocerylist/{grocerylist}/add/{recipe}', 'GroceryListController@manage');
    Route::resource('grocerylist', 'GroceryListController');

});
