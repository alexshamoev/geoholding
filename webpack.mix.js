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
	.sass('resources/sass/_atom.scss', 'public/css')
    .sass('resources/sass/html_tags.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/_atom.scss', 'public/css/admin')
    .sass('resources/sass/admin/bar.scss', 'public/css/admin')
    .sass('resources/sass/admin/classes.scss', 'public/css/admin')
    .sass('resources/sass/admin/for_editors.scss', 'public/css/admin')
    .sass('resources/sass/admin/html_tags.scss', 'public/css/admin')
    .sass('resources/sass/admin/identifiers.scss', 'public/css/admin')
    .sass('resources/sass/admin/left_part.scss', 'public/css/admin')
    .sass('resources/sass/admin/pages.scss', 'public/css/admin')
    .sass('resources/sass/admin/rangs.scss', 'public/css/admin')
    .sass('resources/sass/admin/status_line.scss', 'public/css/admin')
    .sass('resources/sass/admin/tags.scss', 'public/css/admin');
