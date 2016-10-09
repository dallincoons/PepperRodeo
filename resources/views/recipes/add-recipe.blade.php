@extends('layouts.app', ['vue' => 'add-recipe'])

@section('content')
    <h3 class="page-title">New Recipe</h3>
    <div class="recipe-form">
        {!! Form::open(array('url' => '/recipe')) !!}
            <div class="recipe-section">
                <label for="title" class="form-heading">Title*</label>
                <input type="text" id="title" name="title" placeholder="September Grocery List"/>
            </div>

            <div class="recipe-section">
                <label for="category" class="form-heading">Category*</label>
                <select id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>



            <label class="form-heading">Ingredients*</label>

            <div class="ingredient-section">
                <div v-for="item in recipeItems" track-by="$index" class="ingredient-inputs">
                    <div class="qty">
                        <label for="quantity" class="sub-heading">Qty</label>
                        <input type="text" id="quantity" name="recipeFields[@{{$index}}][quantity]" class="qty-input" placeholder="3" />
                    </div>

                    <div class="type">
                        <label for="type" class="sub-heading">Type</label>
                        <input type="text" id="type" name="recipeFields[@{{$index}}][type]" class="type-input" placeholder="cups"/>
                    </div>

                    <div class="ingredient">
                        <label for="ingredient" class="sub-heading">Ingredient</label>
                        <input type="text" id="ingredient" name="recipeFields[@{{$index}}][name]" class="ingredient-input" placeholder="flour"/>
                    </div>

                    <div class="dept">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Department <i class="fa fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach($itemCategories as $category)
                                    <a  class="dropdown-item">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="add-ingredient" v-on:click="addNewItem()"><i class="fa fa-plus-circle"></i> Add ingredient</div>

            <div class="recipe-section">
                <label for="directions" class="form-heading">Directions*</label>
                <textarea name="directions" placeholder="Preheat oven to 350°"></textarea>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="save-button">
                <button class="pr-button">Save</button>
            </div>
        {{ Form::close() }}

    </div>
@endsection