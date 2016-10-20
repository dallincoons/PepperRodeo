@extends('layouts.app', ['vue' => 'single-recipe'])

@section('content')

<div class="recipe-wrapper">
    <h2 class="page-title">{{$recipe->title}}</h2>
    <h6 class="recipe-cat">Categories: <a>Lunch</a>, <a>Dinner</a></h6>
    <nav class="mini-nav">
        <ul>
            <li><a><i class="fa fa-cart-plus"></i></a></li>
            <li><a><i class="fa fa-pencil"></i></a></li>
            <li><a><i class="fa fa-users"></i></a></li>
            <li><a><i class="fa fa-trash"></i></a></li>
        </ul>
    </nav>

    <h3 class="form-heading">Ingredients</h3>
    <ul class="ingredients">
        @foreach($recipe->items as $item)
            <li>{{$item->quantity}} {{$item->type}} {{$item->name}}</li>
        @endforeach
    </ul>

    <h3 class="form-heading">Directions</h3>
    <p>{{$recipe->directions}}</p>

    <h5 class="add-list-title page-title"><a v-on:click="toggleShowListSelection()">Add to Grocery List</a></h5>
    <ul class="lists" v-show="showListSelection">
        @foreach($listsWithoutRecipe as $grocerylist)
            <li><i class="fa fa-list"></i> <a href="/grocerylist/{{$grocerylist->getKey()}}/add/{{$recipe->getKey()}}">{{$grocerylist->title}}</a></li>
        @endforeach
    </ul>

    <input type="hidden" value="{{$recipe->getKey()}}" v-model="recipeId">

</div>



@endsection
