@extends('layouts.app', ['vue' => 'create-recipe'])

@section('content')
    <h3 class="page-title">New Recipe</h3>
    <div class="recipe-form">
        {!! Form::open(array('url' => '/recipe')) !!}

            @include('recipes.includes.recipe-form')

            <div class="save-button">
                <button class="pr-button">Save</button>
            </div>
        {{ Form::close() }}

    </div>
@endsection