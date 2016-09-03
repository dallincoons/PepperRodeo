@extends('layouts.app')

@section('content')
    <h1>{{$recipe->title}}</h1>
    <ul>
        @foreach($recipe->items as $item)
            <li>{{$item->quantity}} {{$item->name}}</li>
        @endforeach
    </ul>
    <h1>Add to Grocery List</h1>
    <ul>
    @foreach(\Auth::user()->groceryLists as $grocerylist)
        <li>{{$grocerylist->title}}</li>
    @endforeach
    </ul>
@endsection