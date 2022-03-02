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


mix.js('resources/js/app.js', 'public/js').vue()
  .js('resources/js/admin/main.js', 'public/js/admin')
  .copy('node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js', 'public/js/admin')
  .copy('node_modules/photoswipe/dist/photoswipe.min.js', 'public/js/plugins')
  .copy('node_modules/photoswipe/dist/photoswipe-ui-default.min.js', 'public/js/plugins')
  .copy('node_modules/photoswipe/dist/photoswipe.css', 'public/css/plugins')
  .copy('node_modules/photoswipe/dist/default-skin/default-skin.css', 'public/css/plugins')
  .sass('resources/sass/admin/main.scss', 'public/css/admin')
  .sass('resources/sass/main.scss', 'public/css');