@extends('layouts.app', ['vue' => 'add-recipe'])

@section('content')
    {!! Form::open(array('url' => '/recipe')) !!}
        <p>Title: <input name="title"></p>
        <p v-for="item in recipeItems" track-by="$index">
            Qty: {!! Form::text('recipeFields[@{{$index}}][quantity]') !!}
            Name: {!! Form::text('recipeFields[@{{$index}}][name]]') !!}
        </p>

    {!! Form::button('Add New Item', ['@click' => 'addNewItem()']) !!}
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}
@endsection