export default {
    data     : function () {
        return {
            showRecipes    : false,
            addAnItem      : false,
            recipes        : PepperRodeo.recipes,
            unaddedRecipes : Object.assign({}, PepperRodeo.recipes),
            addedRecipes   : [],
            recipesToAdd   : [],
            items          : [],
            title          : '',
            newItemName    : '',
            newItemQty     : '',
        }
    },
    methods  : {
        setShowRecipes($bool) {
            this.showRecipes = $bool;
        },
        setAddAnItem($bool){
            this.addAnItem = $bool;
        },
        addItem(){
            var newItem = {
                quantity         : this.newItemQty,
                name             : this.newItemName,
                item_category_id : this.newItemCategoryId
            };
            this.items.push(newItem);

            this.newItemQty        = '';
            this.newItemName       = '';
            this.newItemCategoryId = '';
        },
        removeItem(itemIndex){
            this.items.splice(itemIndex, 1);
        },
        removeAddedRecipe(recipeIndex){
            this.addedRecipes.splice(recipeIndex, 1);
        },
        addRecipes(recipeIds){
            var self = this;
            recipeIds.forEach(function (recipeId) {
                self.addedRecipes.push(self.unaddedRecipes[recipeId]);
                var recipe = self.unaddedRecipes[recipeId];
                recipe.items.forEach(function(item){
                    item.recipe_id = recipe.id;
                    self.items.push(item);
                });
                self.recipesToAdd = [];
                delete self.unaddedRecipes[recipeId];
            });

            this.setShowRecipes(false);
        },
        removeRecipe(recipeId, index){
            var self = this;
            var itemIndexes = [];
            self.items.forEach(function(item){
                if(item.recipe_id == recipeId) {
                    itemIndexes.push(self.items.indexOf(item));
                }
            });
            itemIndexes = itemIndexes.sort(function(a, b){return b-a});
            itemIndexes.forEach(function(index){
                self.items.splice(index, 1);
            });
            self.removeAddedRecipe(index);
        }
    }
}
