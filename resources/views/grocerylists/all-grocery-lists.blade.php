@extends('layouts.app', ['vue' => 'all-grocery-lists'])

@section('content')
    <div class="grocery-lists">

        <h2 class="page-title">My Lists</h2>
        <nav class="mini-nav">
            <ul>
                <li><i class="fa fa-plus"></i></li>
                <li><i class="fa fa-pencil"></i></li>
                <li><i class="fa fa-users"></i></li>
                <li><i class="fa fa-trash"></i></li>
            </ul>
        </nav>

        <ul class="lists">
            @foreach($grocerylists as $list)
                <li><i class="fa fa-list"></i> <a href="grocerylist/{{$list->id}}">{{$list->title}}</a></li>
            @endforeach
        </ul>
    </div>

@endsection