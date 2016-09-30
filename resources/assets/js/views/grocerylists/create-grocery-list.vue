<script>
    export default {
        data : function() {
            return {
                showRecipes : false
            }
        },
        methods : {
            setShowRecipes($bool) {
                this.showRecipes = $bool;
            }
        }
    }
</script>