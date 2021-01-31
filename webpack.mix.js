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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin-panel/main.js', 'public/assets/admin-panel/js')
    .sass('resources/sass/app.scss', 'public/css/main')
    .sass('resources/sass/admin-panel/main.scss', 'public/assets/admin-panel/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .js('resources/js/turbolinks.js', 'public/js')
    // .copy('node_modules/semantic-ui-css/semantic.min.css','public/css/semantic.min.css')
    // .copy('node_modules/semantic-ui-css/semantic.min.js','public/js/semantic.min.js')
    // .copy('node_modules/semantic-ui-css/themes/default/assets/fonts/icons.woff','public/css/themes/default/assets/fonts/icons.woff')
    // .copy('node_modules/semantic-ui-css/themes/default/assets/fonts/icons.woff2','public/css/themes/default/assets/fonts/icons.woff2')
    // .copy('node_modules/semantic-ui-css/themes/default/assets/fonts/icons.ttf','public/css/themes/default/assets/fonts/icons.ttf')
    .copy('node_modules/@amcharts/amcharts4/core.js','public/js/amcharts4/core.js')
    .copy('node_modules/@amcharts/amcharts4/charts.js','public/js/amcharts4/charts.js')
    .copy('node_modules/@amcharts/amcharts4/themes/animated.js','public/js/amcharts4/themes/animated.js')
    .copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js','public/js/sweetalert2/sweetalert2.all.min.js')

;
