import Vue from 'vue';
import AllGroceryLists from './views/grocerylists/all-grocery-lists.js';
import SingleRecipe from './views/recipe/single-recipe.js';
import AddRecipe from './views/recipe/add-recipe.js';
import CreateGroceryList from './views/grocerylists/create-grocery-list.js';

Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
    el: '#PepperRodeoApp',
    components: { AllGroceryLists, SingleRecipe, AddRecipe, CreateGroceryList }
});

