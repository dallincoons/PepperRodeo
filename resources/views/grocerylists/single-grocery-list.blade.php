@extends('layouts.app')

@section('content')
    <h1>Grocery List Name: {{$grocerylist->title}}</h1>
    <ul>
        @foreach($grocerylist->items as $list_item)
            <li>{{$list_item->quantity}} {{$list_item->name}}</li>
        @endforeach
    </ul>
    @if(count($grocerylist->recipes))
        <h2>Recipes</h2>
        <ul>
            @foreach($grocerylist->recipes as $recipe)
                <li>{{$recipe->title}}</li>
            @endforeach
        </ul>
    @endif
@endsection