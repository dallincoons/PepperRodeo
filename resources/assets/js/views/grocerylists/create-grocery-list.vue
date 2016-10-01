<script>
    export default {
        data : function() {
            return {
                showRecipes : false,
                addAnItem : false,
                recipes : PepperRodeo.recipes
            }
        },
        methods : {
            setShowRecipes($bool) {
                this.showRecipes = $bool;
            },
            setAddAnItem($bool){
                this.addAnItem = $bool;
            }
        }
    }
</script>