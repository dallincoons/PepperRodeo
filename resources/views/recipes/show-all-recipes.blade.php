@extends('layouts.app')

@section('content')
        <h2 class="page-title">My Recipes</h2>

        <nav class="mini-nav recipe-nav">
             <ul>
                 <li><a href="#"><i class="fa fa-plus"></i></a></li>
                 <li><a><i class="fa fa-cart-plus"></i></a></li>
                 <li><a><i class="fa fa-pencil"></i></a></li>
                 <li><a><i class="fa fa-users"></i></a></li>
                 <li><a><i class="fa fa-trash"></i></a></li>
             </ul>
        </nav>


        <div class="category-wrapper">
            <ul class="category">
                <li class="category-title"><h3>Category Title</h3></li>
                <li>
                    <ul class="recipes">
                        @foreach($recipes as $recipe)
                            <li><a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="category">
                <li class="category-title"><h3>Category Title</h3></li>
                <li>
                    <ul class="recipes">
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                    </ul>
                </li>

            </ul>
            <ul class="category">
                <li class="category-title"><h3>Category Title</h3></li>
                <li>
                    <ul class="recipes">
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                        <li>Placeholder recipe</li>
                    </ul>
                </li>

            </ul>

        </div>
@endsection