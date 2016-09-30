<script>
    export default {
        data : function() {
            return {
                showRecipes : false,
                addAnItem : false
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