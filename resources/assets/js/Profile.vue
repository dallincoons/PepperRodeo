<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        Your Application's Landing Page.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile">
        {{ name }}
    </div>
</template>

<script>
    export default {
        data () {
            return {
                name: 'Dallin Coons'
            };
        }
    };
</script>

<style>
    .profile {
        background: #eee;
        border: 1px solid #aaa;
        border-radius: 2em;
        margin: 2em auto;
        min-height: 150px;
        padding: 2em;
        width: 300px;
    }
</style>