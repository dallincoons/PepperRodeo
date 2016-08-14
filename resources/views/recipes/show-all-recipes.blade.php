@extends('layouts.app')

@section('content')
        @foreach($recipes as $recipe)
            <a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a>
        @endforeach
@endsection