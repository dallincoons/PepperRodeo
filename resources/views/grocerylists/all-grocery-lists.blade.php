@extends('layouts.app', ['vue' => 'all-grocery-lists'])

@section('content')
    <div class="grocery-lists">

        <h2 class="page-title">My Lists</h2>
        <nav class="mini-nav">
            <ul>
                <li><a href="/grocerylist/create"><i class="fa fa-plus"></i></a></li>
                <li><a><i class="fa fa-trash"></i></a></li>
            </ul>
        </nav>

        <ul class="lists">
            @foreach($grocerylists as $list)
                <li><i class="fa fa-list"></i> <a href="grocerylist/{{$list->id}}">{{$list->title}}</a></li>
            @endforeach
        </ul>
    </div>

@endsection
