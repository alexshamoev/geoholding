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

// mix.react('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

// mix.js('resources/js/app.js', 'public/js')
//  .react()
//  .sass('resources/sass', 'public/css', [
//  ]);


mix.js('resources/js/app.js', 'public/js').react()
  .js('resources/js/admin/basic.js', 'public/js/admin')
  .js('resources/js/modules/modules/a/basic.js', 'public/js/modules/modules/a/basic.js')
  .js('resources/js/admin/rangs.js', 'public/js/admin')
  .js('resources/js/modules/basic.js', 'public/js/modules')
  .sass('resources/sass/modules/_atom.scss', 'public/css/modules')
  .sass('resources/sass/modules/html_tags.scss', 'public/css/modules')
  .sass('resources/sass/modules/icons.scss', 'public/css/modules')
  .sass('resources/sass/modules/app.scss', 'public/css/modules')
  .sass('resources/sass/modules/main.scss', 'public/css/modules')
  .sass('resources/sass/modules/custom-bootstrap.scss', 'public/css/modules')
  .sass('resources/sass/admin/_atom.scss', 'public/css/admin')
  .sass('resources/sass/admin/classes.scss', 'public/css/admin')
  .sass('resources/sass/admin/for_editors.scss', 'public/css/admin')
  .sass('resources/sass/admin/html_tags.scss', 'public/css/admin')
  .sass('resources/sass/admin/identifiers.scss', 'public/css/admin')
  .sass('resources/sass/admin/custom-bootstrap.scss', 'public/css/admin')
  .sass('resources/sass/admin/jquery_ui.scss', 'public/css/admin')
  .sass('resources/sass/modules/menu_buttons/styles.scss', 'public/css/modules/menu_buttons')
  .sass('resources/sass/modules/header/styles.scss', 'public/css/modules/header')
  .sass('resources/sass/modules/footer/styles.scss', 'public/css/modules/footer')
  .sass('resources/sass/modules/photo_gallery/styles.scss', 'public/css/modules/photo_gallery')
  .sass('resources/sass/modules/text_lines.scss', 'public/css/modules')
  .sass('resources/sass/modules/text_lines_max.scss', 'public/css/modules')
  .sass('resources/sass/modules.scss', 'public/css');