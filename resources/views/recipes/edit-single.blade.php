@extends('layouts.app')

@section('content')
    {!! Form::open(array('url' => '/recipe/' . $recipe->id, 'method' => 'POST')) !!}
        {!! method_field('patch') !!}
        @foreach($recipe->items as $item)
            <div class="ingredient-section">
                <div class="ingredient-inputs">
                    <div class="qty">
                        <label for="quantity" class="sub-heading">Qty</label>
                        <input type="text" id="quantity" name="items[{{$item->id}}][quantity]" class="qty-input" value="{{$item->quantity}}" />
                    </div>

                    <div class="type">
                        <label for="type" class="sub-heading">Type</label>
                        <input type="text" id="type" name="items[{{$item->id}}][type]" class="type-input" value="{{$item->type}}" />
                    </div>

                    <div class="ingredient">
                        <label for="ingredient" class="sub-heading">Ingredient</label>
                        <input type="text" id="ingredient" name="items[{{$item->id}}][name]" class="ingredient-input" value="{{$item->name}}" />
                    </div>

                    <div class="dept">
                        <select class="recipe-section__selection--category dept_select" name="items[{{$item->id}}][item_category_id]">
                            @foreach($itemCategories as $category)
                                <option @if($category->id == $item->item_category_id) selected @endif value="{{$category->id}}" class="dropdown-item">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
        {!! Form::submit() !!}
    {!! Form::close() !!}
@endsection