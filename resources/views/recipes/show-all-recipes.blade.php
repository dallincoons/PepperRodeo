@extends('layouts.app')

@section('content')
        <h2 class="page-title">My Recipes</h2>

        <nav class="recipe-mini-nav">
             <ul>
                 <li><a><i class="fa fa-plus"></i></a></li>
                 <li><a><i class="fa fa-cart-plus"></i></a></li>
                 <li><a><i class="fa fa-pencil"></i></a></li>
                 <li><a><i class="fa fa-plus"></i></a></li>
                 <li><a><i class="fa fa-plus"></i></a></li>
             </ul>
        </nav>

        <ul>
        @foreach($recipes as $recipe)
            <li><a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a></li>
        @endforeach
        </ul>
@endsection