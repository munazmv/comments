const mix = require('laravel-mix');
const path = require('path');
const tailwindcss = require('tailwindcss');

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

if (process.env.npm_lifecycle_event !== 'hot') {
  mix.version()
}

mix.webpackConfig({
  devServer: {
    contentBase: path.resolve(__dirname, 'public'),
    disableHostCheck: true
  }
});

mix.react('resources/js/app.js', 'public/js');


mix.sass('resources/sass/app.scss', 'public/css')
  .options({
    processCssUrls: false,
    postCss: [ tailwindcss('./tailwind.config.js') ],
  });

