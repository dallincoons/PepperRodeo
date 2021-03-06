<div class="recipe-section">
    <label for="title" class="form-heading">Title*</label>
    {!! Form::text('title', null, ['id' => 'title', 'placeholder' => 'Chicken & Rice Casserole']) !!}
</div>

<div class="recipe-section">
    <label for="category" class="form-heading">Category*</label>
    <div class="recipe-section__selection-group--category">
        <select v-model="selectedCategory" class="recipe-section__selection--category" name="category" style="flex:1;" >
            <option v-for="category in categories" value="@{{category.id}}">@{{category.name}}</option>
        </select>
        <button type="button" v-show="!addingCategory" v-on:click="this.addingCategory = true" class="recipe-section__button"><i class="fa fa-plus-circle"></i> Add New</button>
    </div>
    <div v-show="addingCategory" class="addingCategory">
        <input v-model="newCategory" />
        <button v-on:click="addNewCategory()" type="button" class="recipe-section__button"><i class="fa fa-plus-circle"></i> Add</button>
        <button v-on:click="this.addingCategory = false" type="button" class="recipe-section__button">Cancel</button>
    </div>
</div>

<label class="form-heading">Ingredients*</label>

<div class="ingredient-section">
    <div v-for="item in recipeItems" track-by="$index" class="ingredient-inputs">
        <input type="hidden" name="recipeFields[@{{$index}}][id]" value="@{{ item.id }}"/>
        <div class="qty">
            <label for="quantity" class="sub-heading">Qty</label>
            <input type="text" id="quantity" name="recipeFields[@{{$index}}][quantity]" class="qty-input" placeholder="3" value="@{{ item.quantity }}"/>
        </div>

        <div class="type">
            <label for="type" class="sub-heading">Type</label>
            <input type="text" id="type" name="recipeFields[@{{$index}}][type]" class="type-input" placeholder="cups" value="@{{ item.type }}" />
        </div>

        <div class="ingredient">
            <label for="ingredient" class="sub-heading">Ingredient</label>
            <input type="text" id="ingredient" name="recipeFields[@{{$index}}][name]" class="ingredient-input" placeholder="flour" value="@{{ item.name }}"/>
        </div>

        <div class="dept">
            <select name="recipeFields[@{{$index}}][item_category_id]" class="recipe-section__selection--category dept_select" v-model="category_ids[$index] =  item.item_category_id">
                @foreach($itemCategories as $category)
                    <option value="{{$category->id}}"  class="dropdown-item">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="add-ingredient" v-on:click="addNewItem()"><i class="fa fa-plus-circle"></i> Add ingredient</div>
<div class="recipe-section">
    <label for="directions" class="form-heading">Directions*</label>
    {!! Form::textarea('directions', null, ['placeholder' => 'Preheat oven to 350°']) !!}
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
