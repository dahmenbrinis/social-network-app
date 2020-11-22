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
    .postCss('resources/css/app.css', 'public/css', [
        // require('postcss'),
        require('tailwindcss'),
    ]);
mix.webpackConfig(require('./webpack.config'));
mix.browserSync({
    proxy: "http://localhost:8000",


// Don't try to inject, just do a page refresh
    injectChanges: false,
});

