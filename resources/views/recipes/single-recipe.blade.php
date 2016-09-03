@extends('layouts.app')

@section('content')
    <h1>{{$recipe->title}}</h1>
    <ul>
        @foreach($recipe->items as $item)
            <li>{{$item->quantity}} {{$item->name}}</li>
        @endforeach
    </ul>
    <a>Add to Grocery List</a>
@endsection