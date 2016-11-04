    export default {
        data: function() {
            return {
                recipeId : '',
                showListSelection : false
            }
        },
        methods : {
            addToGroceryList : function(groceryListId){
                this.$http.put('/grocerylist/' + groceryListId, {'recipe_id' : this.recipeId}).then(function(response){
                    console.log(response.data);
                });
            },
            toggleShowListSelection : function(){
                this.showListSelection = !this.showListSelection;
            },
            submitDeleteRecipe : function(){
                document.getElementById('recipe-delete').submit();
            }
        }
    }
