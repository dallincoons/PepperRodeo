@extends('layouts.app')

@section('content')
    <h1>{{$grocerylist->title}}</h1>

    <h2>Recipes</h2>
    <ul>
        @foreach($grocerylist->recipes as $recipe)
            <li>{{$recipe->title}}</li>
        @endforeach
    </ul>
@endsection