@extends('layouts.app')

@section('content')
    {!! Form::open(array('url' => '/recipe')) !!}

    {!! Form::text('recipeFields[0][qty]') !!}
    {!! Form::text('recipeFields[0][item_name]]') !!}

    {!! Form::text('recipeFields[1][qty]') !!}
    {!! Form::text('recipeFields[1][item_name]') !!}

    {!! Form::button('Add New Item') !!}
    {!! Form::submit('Create') !!}
    {!! Form::close() !!}
@endsection