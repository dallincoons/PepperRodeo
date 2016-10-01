<script>
    console.log(PepperRodeo.recipes);
    export default {
        data : function() {
            return {
                showRecipes : false,
                addAnItem : false,
                recipes : PepperRodeo.recipes,
                unaddedRecipes : Object.assign({}, PepperRodeo.recipes),
                addedRecipes : [],
                recipesToAdd : []
            }
        },
        methods : {
            setShowRecipes($bool) {
                this.showRecipes = $bool;
            },
            setAddAnItem($bool){
                this.addAnItem = $bool;
            },
            items(){
                var items = [];
                this.addedRecipes.forEach(function(recipe){
                    items = items.concat(recipe.items);
                });
                return items;
            },
            addRecipes(recipeIds){
                var self = this;
                recipeIds.forEach(function(recipeId){
                    self.addedRecipes.push(self.unaddedRecipes[recipeId]);
                    delete self.unaddedRecipes[recipeId];
                    self.recipesToAdd = [];
                });
                this.setShowRecipes(false);
            }
        }
    }
</script>