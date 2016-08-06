<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('quantity');
            $table->integer('recipe_id')->unsigned()->nullable();
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->integer('grocery_list_id')->unsigned()->nullable();
            $table->foreign('grocery_list_id')->references('id')->on('grocery_list');
            $table->integer('isCheckedOff')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
