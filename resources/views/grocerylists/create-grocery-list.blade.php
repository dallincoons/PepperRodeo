@extends('layouts.app', ['vue' => 'create-grocery-list'])

@section('content')
    <div class="create-list" v-if="!showRecipes">
        <h2 class="page-title">Create List</h2>
        {{Form::open(['url' => '/grocerylist'])}}
        <label for="title" class="form-heading">Title*</label>
        <input name="title" class="form-heading" placeholder="September Grocery List"/>
        <a v-on:click="setShowRecipes(true)"><i class="fa fa-plus-circle"></i> Add a recipe</a>

        @foreach($recipes as $recipe)
            <div class="recipes-added">
                <p><a>X</a> | {{$recipe->title}}</p>
            </div>
        @endforeach

        <a><i class="fa fa-plus-circle"></i> Add an item</a>
        <div class="item-section">
            <div class="items-inputs">
                <div class="qty">
                    <label for="quantity" class="sub-heading">Qty</label>
                    <input type="text" id="quantity" name="recipeFields[@{{$index}}][quantity]" class="qty-input" placeholder="1" />
                </div>

                <div class="type">
                    <label for="type" class="sub-heading">Type</label>
                    <input type="text" id="type" name="recipeFields[@{{$index}}][type]" class="type-input" placeholder="bottle"/>
                </div>

                <div class="ingredient">
                    <label for="item" class="sub-heading">Item</label>
                    <input type="text" id="item" name="recipeFields[@{{$index}}][name]" class="ingredient-input" placeholder="shampoo"/>
                </div>
            </div>
        </div>

        <div class="category-wrapper">
            <ul class="category">
                <li class="category-title"><h3>Dairy</h3></li>
                <li>
                    <ul class="recipes list-items">
                        <li>1 gallon milk</li>
                        <li>2 dozen eggs</li>
                        <li>1 tub butter</li>
                    </ul>
                </li>
            </ul>
            <ul class="category">
                <li class="category-title"><h3>Canned Goods</h3></li>
                <li>
                    <ul class="recipes list-items">
                        <li>3 15 oz cans tomato soup</li>
                        <li>1 10 oz can cream of chicken</li>
                        <li>1 28oz can of crushed tomatoes</li>
                    </ul>
                </li>

            </ul>
            <ul class="category">
                <li class="category-title"><h3>Grains</h3></li>
                <li>
                    <ul class="recipes list-items">
                        <li>2 loaves bread</li>
                        <li>1 set muffins</li>
                    </ul>
                </li>

            </ul>

        </div>

        <div class="save-button">
            <button class="pr-button">Save List</button>
        </div>
        {{--{{Form::submit()}}--}}
        {{Form::close()}}
    </div>
    <div v-if="showRecipes">
        <ul>
            <button v-on:click="setShowRecipes(false)">Back</button>
            @foreach($recipes as $recipe)
                <li>{{$recipe->title}} <input type="checkbox" name="recipeIds[{{$recipe->getKey()}}]"></li>
            @endforeach
        </ul>


    </div>

@endsection