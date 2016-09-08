@extends('layouts.app', ['vue' => 'all-grocery-lists'])

@section('content')
    <ul>
    @foreach($grocerylists as $list)
        <li><a href="grocerylist/{{$list->id}}">{{$list->title}}</a></li>
    @endforeach
    </ul>
@endsection