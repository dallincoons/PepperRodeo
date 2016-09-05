import Vue from 'vue';
import AllGroceryLists from './views/grocerylists/all-grocery-lists.vue';
import SingleRecipe from './views/recipe/single-recipe.vue';
import AddRecipe from './views/recipe/add-recipe.vue';

Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
    el: '#PepperRodeoApp',
    components: { AllGroceryLists, SingleRecipe, AddRecipe }
});

