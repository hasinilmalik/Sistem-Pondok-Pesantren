const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sourceMaps();

// mix.js('resources/js/app.js', 'public/js')
// .sass('resources/sass/app.scss', 'public/css')
// .sass('resources/sass/toastr.scss', 'public/css');

// mix.scripts(
//     [
//         "node_modules/bootstrap/dist/js/bootstrap.js",
//         "node_modules/toastr/toastr.js",
//         "node_modules/selectize/dist/js/selectize.js",
//     ],
//     "public/js/app.js"
// ).styles(
//     [
//         "node_modules/bootstrap/dist/css/bootstrap.css",
//         "node_modules/toastr/build/toastr.css",
//         "node_modules/selectize/dist/css/selectize.css",
//         "resources/assets/css/app.css",
//     ],
//     "public/css/app.css"
// );
