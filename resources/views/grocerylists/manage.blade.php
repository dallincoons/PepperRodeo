@extends('layouts.app')

@section('content')
<div class="manage-wrapper">

    <h3 class="page-title">What items do you want to add?</h3>

    {{Form::open(['url' => '/grocerylist/' . $grocerylist->getKey(), 'method' => 'patch', 'class' => 'manage-form'])}}
    <ul class="items-to-add">
        @foreach($items as $item)
            <li>
                <input value="{{$item->quantity}}" />
                <input value="{{$item->name}}"  />
                <input type="checkbox" name="items[{{$item->getKey()}}]" value="{{$item}}" />
            </li>
        @endforeach
    </ul>

    <button class="pr-button manage-button">{{Form::submit()}}</button>

</div>

    {{Form::close()}}
@endsection
