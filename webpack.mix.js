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

 mix.setPublicPath('public_html/');
mix.js('resources/js/app.js', 'public_html/js')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public_html/webfonts')
    .copy('node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'public_html/css/fontawesome.min.css')
    .postCss('resources/css/app.css', 'public_html/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));
    ;