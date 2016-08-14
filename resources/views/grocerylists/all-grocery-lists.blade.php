@extends('layouts.app')

@section('content')
    @foreach($grocerylists as $list)
        <a href="grocerylist/{{$list->id}}">{{$list->title}}</a>
    @endforeach
@endsection