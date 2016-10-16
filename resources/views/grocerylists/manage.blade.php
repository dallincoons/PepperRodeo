@extends('layouts.app')

@section('content')
    <h2>What items do you want to add?</h2>

    {{Form::open(['url' => '/grocerylist/' . $grocerylist->getKey(), 'method' => 'patch'])}}
    <ul>
        @foreach($items as $item)
            <li>
                <input value="{{$item->quantity}}" />
                <input value="{{$item->name}}"  />
                <input type="checkbox" name="items[{{$item->getKey()}}]" value="{{$item}}" />
            </li>
        @endforeach
    </ul>
    {{Form::submit()}}
    {{Form::close()}}
@endsection
