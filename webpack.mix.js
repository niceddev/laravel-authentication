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

mix.styles([
    'resources/css/panel.css'
], 'public/css/panel.css');
mix.styles([
    'resources/css/app.css',
    'resources/css/mail/register.css',
], 'public/css/app.css');

mix.js('resources/js/panel.js', 'public/js');
mix.js('resources/js/app.js', 'public/js');
