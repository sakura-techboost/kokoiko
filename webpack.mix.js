const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/rayouts.scss','public/css')
    .sass('resources/sass/testrayouts.scss','public/css')
    .sass('resources/sass/mediaqueries.scss','public/css')
    .js('resources/js/content.js', 'public/js') //←追加 10月7日
    .js('resources/js/testcontent.js', 'public/js') //←追加 10月13日
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();
