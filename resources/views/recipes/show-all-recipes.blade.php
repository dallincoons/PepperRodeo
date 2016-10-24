@extends('layouts.app')

@section('content')
        <h2 class="page-title">My Recipes</h2>

        <nav class="mini-nav recipe-nav">
             <ul>
                 <li><a href="#"><i class="fa fa-plus"></i></a></li>
                 <li><a><i class="fa fa-cart-plus"></i></a></li>
                 <li><a><i class="fa fa-pencil"></i></a></li>
                 <li><a><i class="fa fa-trash"></i></a></li>
             </ul>
        </nav>
        <div class="category-wrapper">
            <ul class="category">
                @foreach($recipes as $key => $recipe)
                <li class="category-title"><h3>{{$key}}</h3></li>
                <li>
                    <ul class="recipes">
                        @foreach($recipe as $recipe2)
                            <li>
                                <label class="control control--checkbox"><a href="recipe/{{$recipe2->id}}">{{$recipe2->title}}</a>
                                    <input type="checkbox" id="cbox1" value="first_checkbox" class="recipe-check">
                                    <div class="control__indicator"></div>
                                </label>


                            </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
@endsection
