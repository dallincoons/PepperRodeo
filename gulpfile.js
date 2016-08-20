process.env.DISABLE_NOTIFIER = false;

var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir.config.js.browserify.watchify = {
    enabled: true,
    options: {
        poll: true
    }
};

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.browserify('app.js');
});
