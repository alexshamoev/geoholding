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


// sourceMaps added for popper console bug fix.

mix.js('resources/js/app.js', 'public/js').sourceMaps().vue().react()
  .js('resources/js/admin/main.js', 'public/js/admin').vue()
  .copy('node_modules/photoswipe/dist/photoswipe.min.js', 'public/js/plugins')
  .copy('node_modules/photoswipe/dist/photoswipe-ui-default.min.js', 'public/js/plugins')
  .copy('node_modules/photoswipe/dist/photoswipe.css', 'public/css/plugins')
  .copy('node_modules/photoswipe/dist/default-skin/default-skin.css', 'public/css/plugins')
  .copy('node_modules/owl.carousel/dist/assets/owl.carousel.min.css', 'public/css/plugins')
  .copy('node_modules/owl.carousel/dist/assets/owl.theme.default.min.css', 'public/css/plugins')
  .copy('node_modules/owl.carousel/dist/owl.carousel.min.js', 'public/js/plugins')
  .copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/js/plugins')
  .sass('resources/sass/admin/main.scss', 'public/css/admin')
  .sass('resources/sass/main.scss', 'public/css')
  .sass('resources/sass/ge.scss', 'public/css')
  .sass('resources/sass/en.scss', 'public/css')
  .sass('resources/sass/ru.scss', 'public/css');