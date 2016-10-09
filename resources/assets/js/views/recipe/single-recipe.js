    export default {
        data: function() {
            return {
                recipeId : ''
            }
        },
        methods : {
            addToGroceryList : function(groceryListId){
                this.$http.put('/grocerylist/' + groceryListId, {'recipe_id' : this.recipeId}).then(function(response){
                    console.log(response.data);
                });
            }
        }
    }