@extends('layouts.app')

@section('content')
    @foreach($grocerylists as $list)
        <a href="recipe/{{$list->id}}">{{$list->title}}</a>
    @endforeach
@endsection