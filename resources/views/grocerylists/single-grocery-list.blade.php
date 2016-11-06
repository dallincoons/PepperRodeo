@extends('layouts.app', ['vue' => 'single-list'])

@section('content')
    <div class="grocery-list-wrapper">

        <h2 class="page-title">{{$grocerylist->title}}</h2>

        <nav class="mini-nav">
            <ul class="list-nav">
                <li><a href="/grocerylist/{{$grocerylist->id}}/edit"><i class="fa fa-pencil"></i></a></li>
                <li><form action="/grocerylist/{{$grocerylist->id}}" method="POST" id="list-delete">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a v-on:click="submitDeleteList()"><i class="fa fa-trash"></i></a>
                </form></li>
            </ul>
        </nav>

        <div class="list-view-toggle">
            <a class="toggle-active">By Items</a><a class="toggle-inactive">By Recipe</a>
        </div>

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
