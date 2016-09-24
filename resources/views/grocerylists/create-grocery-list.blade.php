@extends('layouts.app')

@section('content')
    {{Form::open(['url' => '/grocerylist'])}}
    What is the name of your grocery list? <input name="title" />
    <h2>Select a recipe to add</h2>
    <ul>
        @foreach($recipes as $recipe)
            <li>{{$recipe->title}} <input type="checkbox" name="recipeIds[{{$recipe->getKey()}}]"></li>
        @endforeach
    </ul>

    <h2>Add your own items</h2>
    {{Form::submit()}}
    {{Form::close()}}
@endsection