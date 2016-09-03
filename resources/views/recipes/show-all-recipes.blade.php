@extends('layouts.app')

@section('content')
        <ul>
        @foreach($recipes as $recipe)
            <li><a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a></li>
        @endforeach
        </ul>
@endsection