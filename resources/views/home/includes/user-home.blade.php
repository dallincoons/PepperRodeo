<h1>Congratulations, you are logged in</h1>

@foreach($recipes as $recipe)
    <h2><a href="recipe/{{$recipe->id}}">{{$recipe->title}}</a></h2>
@endforeach

<a href="/recipe/create">Add a Recipe</a>

<a href="/grocerylist/create">Create a Grocery List</a>