@extends('layouts.app')

@section('content')
    <div class="grocery-list-wrapper">

        <h2 class="page-title">{{$grocerylist->title}}</h2>

        <nav class="mini-nav">
            <ul class="list-nav">
                <li><a><i class="fa fa-pencil"></i></a></li>
                <li><a><i class="fa fa-trash"></i></a></li>
            </ul>
        </nav>

        <div class="list-view-toggle">
            <a class="toggle-active">By Items</a><a class="toggle-inactive">By Recipe</a>
        </div>

        @if(count($grocerylist->recipes))
            <h4>Recipes</h4>
            <ul>
                @foreach($grocerylist->recipes as $recipe)
                    <li>{{$recipe->title}}</li>
                @endforeach
            </ul>
        @endif

        <div class="category-wrapper">
            <ul class="category">
                <li class="category-title"><h3>Dairy</h3></li>
                <li>
                    <ul class="recipes list-items">
                        @foreach($grocerylist->items as $list_item)
                            <li>{{$list_item->quantity}} {{$list_item->type}} {{$list_item->name}}</li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>

    </div>

@endsection
