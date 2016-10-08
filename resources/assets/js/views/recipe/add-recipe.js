    export default {
        data : function(){
            return {
                recipeItemElement : '<input type="text">',
                recipeItems : ['']
            }
        },
        methods : {
            addNewItem() {
                this.recipeItems.push('');
            }
        }
    }