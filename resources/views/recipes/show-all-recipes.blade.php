@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($recipes as $recipe)
                            <a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection