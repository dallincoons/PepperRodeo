@extends('layouts.app', ['vue' => 'show-all-recipes'])

@section('content')
        <h2 class="page-title">My Recipes</h2>

        <form method="POST" action="/recipe/delete" id="deleteForm">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <nav class="mini-nav recipe-nav">
             <ul>
                 <li><a href="#"><i class="fa fa-plus"></i></a></li>
                 <li><a><i class="fa fa-cart-plus"></i></a></li>
                 <li><a><i class="fa fa-pencil"></i></a></li>
                 <li><a v-on:click="deleteRecipes(recipesChecked)"><i class="fa fa-trash"></i></a></li>
             </ul>
        </nav>
        <div class="category-wrapper">
            <ul class="category">
                @foreach($recipesWithCategories as $category => $recipes)
                <li class="category-title"><h3>{{$category}}</h3></li>
                <li>
                    <ul class="recipes">
                        @foreach($recipes as $recipe)
                            <li>
                                <label class="control control--checkbox"><a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a>
                                    <input type="checkbox" id="cbox1" name="recipeIds[]" class="recipe-check" value="{{$recipe->id}}">
                                    <div class="control__indicator"></div>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        </form>
@endsection
