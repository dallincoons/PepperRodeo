    export default {
        data : function(){
            return {
                recipeItemElement : '<input type="text">',
                recipeItems : [''],
                addingCategory : false
            }
        },
        methods : {
            addNewItem() {
                this.recipeItems.push('');
            },
            addNewCategory() {
                this.addingCategory = true;
            }
        }
    }