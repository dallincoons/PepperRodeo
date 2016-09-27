@extends('layouts.app', ['vue' => 'add-recipe'])

@section('content')
    <h2>New Recipe</h2>
    {!! Form::open(array('url' => '/recipe')) !!}
        <p>Title: <input name="title"></p>
        <p v-for="item in recipeItems" track-by="$index">
            {{Form::label('Qty')}} {!! Form::text('recipeFields[@{{$index}}][quantity]', null, ['name' => 'qty', 'class' => 'foo', 'placeholder' => 'poop']) !!}
            Name: {!! Form::text('recipeFields[@{{$index}}][name]]') !!}
        </p>

    {!! Form::button('Add New Item', ['@click' => 'addNewItem()']) !!}
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}
@endsection