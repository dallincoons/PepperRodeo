@extends('layouts.app', ['vue' => 'all-grocery-lists'])

@section('content')
    @foreach($grocerylists as $list)
        <a href="grocerylist/{{$list->id}}">{{$list->title}}</a>
    @endforeach
    <h1>test</h1>
@endsection