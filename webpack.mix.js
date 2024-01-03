const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/sass/login/login.scss', 'public/css')
    .sass('resources/sass/default.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/nav.js', 'public/js')
    .js('resources/js/pizzas.js', 'public/js')
    .js('resources/js/events.js', 'public/js')
    .js('resources/js/order.js', 'public/js')

