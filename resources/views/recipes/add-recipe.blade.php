@extends('layouts.app', ['vue' => 'create-recipe'])

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
                <div class="recipe-section__selection-group--category">
                    <select v-model="selectedCategory" class="recipe-section__selection--category" name="category" style="flex:1;">
                            <option v-for="category in categories" value="@{{category.id}}">@{{category.name}}</option>
                    </select>
                    <button type="button" v-show="!addingCategory" v-on:click="this.addingCategory = true">Add New</button>
                </div>
                <div v-show="addingCategory">
                    <input v-model="newCategory" />
                    <button v-on:click="addNewCategory()" type="button">Add</button>
                    <button v-on:click="this.addingCategory = false" type="button">Cancel</button>
                </div>
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
                        {{--<div class="dropdown">--}}
                            {{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--Department <i class="fa fa-angle-down"></i>--}}
                            {{--</button>--}}
                            <select name="recipeFields[@{{$index}}][item_category_id]">
                                @foreach($itemCategories as $category)
                                    <option value="{{$category->id}}"  class="dropdown-item">{{$category->name}}</option>
                                @endforeach
                            </select>
                        {{--</div>--}}
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