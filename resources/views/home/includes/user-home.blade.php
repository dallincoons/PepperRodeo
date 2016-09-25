<h1>Congratulations, you are logged in</h1>

@foreach($lists as $list)
    <h2><a href="grocerylist/{{$list->getKey()}}">{{$list->title}}</a></h2>
@endforeach

<a href="/recipe/create">Add a Recipe</a>

<a href="/grocerylist/create">Create a Grocery List</a>