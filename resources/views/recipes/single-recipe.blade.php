@extends('layouts.app', ['vue' => 'single-recipe'])

@section('content')
    <h1>{{$recipe->title}}</h1>
    <ul>
        @foreach($recipe->items as $item)
            <li>{{$item->quantity}} {{$item->name}}</li>
        @endforeach
    </ul>
    <h1>Add to Grocery List</h1>
    <ul>
    @foreach($listsWithoutRecipe as $grocerylist)
        {{--<li @click="addToGroceryList({{$grocerylist->getKey()}})">{{$grocerylist->title}}</li>--}}
        <li><a href="/grocerylist/{{$grocerylist->getKey()}}/add/{{$recipe->getKey()}}">{{$grocerylist->title}}</a></li>
    @endforeach
    </ul>

<input type="hidden" value="{{$recipe->getKey()}}" v-model="recipeId">
@endsection