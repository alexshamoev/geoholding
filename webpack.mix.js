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

mix.js('resources/js/app.js', 'public/js');

mix.styles([
    'resources/sass/admin/_atom.scss',
    'resources/sass/admin/bar.scss',
    'resources/sass/admin/classes.scss',
    'resources/sass/admin/for_editors.scss',
    'resources/sass/admin/html_tags.scss',
    'resources/sass/admin/identifiers.scss',
    'resources/sass/admin/left_part.scss',
    'resources/sass/admin/pages.scss',
    'resources/sass/admin/rangs.scss',
    'resources/sass/admin/status_line.scss',
    'resources/sass/admin/tags.scss',
    'resources/sass/admin/custom-bootstrap.scss'
], 'public/css/admin/all-admin-styles.css');

mix.styles([
    'resources/sass/_atom.scss',
    'resources/sass/html_tags.scss',
    'resources/sass/app.scss'
], 'public/css/all-styles.css');
