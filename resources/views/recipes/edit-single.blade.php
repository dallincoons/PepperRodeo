@extends('layouts.app')

@section('content')
    {!! Form::model($recipe, ['route' => ['recipe.update', $recipe->getKey(), 'method' => 'POST']]) !!}
        {!! method_field('patch') !!}

        @include('recipes.includes.recipe-form')

        {!! Form::submit() !!}
    {!! Form::close() !!}
@endsection