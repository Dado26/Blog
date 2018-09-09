const { mix } = require('laravel-mix');

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
//FRONT
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();

//ADMIN
mix.js('resources/assets/admin/js/app.js', 'public/admin_assets/dist/js/custom.js')
   .sass('resources/assets/admin/sass/app.scss', 'public/admin_assets/dist/css/custom.css')
   .version();