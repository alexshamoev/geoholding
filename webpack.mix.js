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
    .js('resources/js/admin/basic.js', 'public/js/admin')
    .js('resources/js/modules/basic.js', 'public/js/modules')
    .sass('resources/sass/modules/_atom.scss', 'public/css/modules')
    .sass('resources/sass/modules/html_tags.scss', 'public/css/modules')
    .sass('resources/sass/modules/icons.scss', 'public/css/modules')
    .sass('resources/sass/modules/app.scss', 'public/css/modules')
    .sass('resources/sass/modules/main.scss', 'public/css/modules')
    .sass('resources/sass/modules/custom-bootstrap.scss', 'public/css/modules')
    .sass('resources/sass/admin/_atom.scss', 'public/css/admin')
    .sass('resources/sass/admin/bar.scss', 'public/css/admin')
    .sass('resources/sass/admin/classes.scss', 'public/css/admin')
    .sass('resources/sass/admin/for_editors.scss', 'public/css/admin')
    .sass('resources/sass/admin/html_tags.scss', 'public/css/admin')
    .sass('resources/sass/admin/identifiers.scss', 'public/css/admin')
    .sass('resources/sass/admin/left_part.scss', 'public/css/admin')
    .sass('resources/sass/admin/pages.scss', 'public/css/admin')
    .sass('resources/sass/admin/status_line.scss', 'public/css/admin')
    .sass('resources/sass/admin/custom-bootstrap.scss', 'public/css/admin')
    .sass('resources/sass/admin/tags.scss', 'public/css/admin');

// mix.styles([
//     'resources/sass/admin/_atom.scss',
//     'resources/sass/admin/bar.scss',
//     'resources/sass/admin/classes.scss',
//     'resources/sass/admin/for_editors.scss',
//     'resources/sass/admin/html_tags.scss',
//     'resources/sass/admin/identifiers.scss',
//     'resources/sass/admin/left_part.scss',
//     'resources/sass/admin/pages.scss',
//     'resources/sass/admin/rangs.scss',
//     'resources/sass/admin/status_line.scss',
//     'resources/sass/admin/tags.scss',
//     'resources/sass/admin/custom-bootstrap.scss'
// ], 'public/css/admin/all-admin-styles.css');

// mix.styles([
//     'resources/sass/_atom.scss',
//     'resources/sass/html_tags.scss',
//     'resources/sass/app.scss'
// ], 'public/css/all-styles.css');
