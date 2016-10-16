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
            newItemType    : ''
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
        addRecipes(recipeIds){
            var self = this;
            recipeIds.forEach(function (recipeId) {
                self.addedRecipes.push(self.unaddedRecipes[recipeId]);
                delete self.unaddedRecipes[recipeId];
                self.recipesToAdd = [];
            });
            this.setShowRecipes(false);
        }
    },
    computed : {
        computedItems : function () {
            var items = this.items;
            this.addedRecipes.forEach(function (recipe) {
                items = items.concat(recipe.items);
            });
            return items;
        }
    }
}
