@extends('layouts.app', ['vue' => 'add-recipe'])

@section('content')
    {{--<h2 class="page-title">New Recipe</h2>--}}
    {{--{!! Form::open(array('url' => '/recipe')) !!}--}}
        {{--<div><label>Title</label><input name="title"></div>--}}
        {{--<div><label>Category</label><input name="category"></div>--}}
        {{--<div v-for="item in recipeItems" track-by="$index">--}}
            {{--{{Form::label('Qty')}} {!! Form::text('recipeFields[@{{$index}}][quantity]', null, ['name' => 'qty', 'class' => 'foo', 'placeholder' => 'poop']) !!}--}}
            {{--Name: {!! Form::text('recipeFields[@{{$index}}][name]]') !!}--}}
        {{--</div>--}}

    {{--{!! Form::button('Add New Item', ['@click' => 'addNewItem()']) !!}--}}
    {{--{!! Form::submit('Create') !!}--}}
    {{--{!! Form::close() !!}--}}

    <h2 class="page-title">New Recipe</h2>
    <div class="recipe-form">
        <form>
            <div class="recipe-section">
                <label for="title" class="form-heading">Title*</label>
                <input type="text" id="title" name="title" placeholder="September Grocery List"/>
            </div>

            <div class="recipe-section">
                <label for="category" class="form-heading">Category*</label>
                <input type="text" id="category" name="category" placeholder="Costco" />
            </div>

            <label class="form-heading">Ingredients*</label>

            <div class="ingredient-section">
                <div class="qty">
                    <label for="quantity" class="sub-heading">Qty</label>
                    <input type="text" id="quantity" name="quantity" class="qty-input" placeholder="3" />
                </div>

                <div class="type">
                    <label for="type" class="sub-heading">Type</label>
                    <input type="text" id="type" name="type" class="type-input" placeholder="cups"/>
                </div>

                <div class="ingredient">
                    <label for="ingredient" class="sub-heading">Ingredient</label>
                    <input type="text" id="ingredient" name="ingredient" class="ingredient-input" placeholder="flour"/>
                </div>

            </div>

            <div class="add-ingredient"><i class="fa fa-plus-circle"></i> Add ingredient</div>

            <div class="recipe-section">
                <label for="directions" class="form-heading">Directions*</label>
                <textarea name="directions" placeholder="Preheat oven to 350°"></textarea>
            </div>

            <div class="save-button">
                <button class="pr-button">Save</button>
            </div>

        </form>

    </div>
@endsection