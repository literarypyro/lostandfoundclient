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
const path=require("path");

mix.js('resources/js/app.js', 'public/js').vue();
mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
]);
mix.alias({
    '@components': path.resolve(__dirname,'resources/js/components'),
    '@images': path.resolve(__dirname,'resources/images'),


});

mix.copy('resources/images', 'public/images');


mix.webpackConfig({
  module: {
      rules: [
          {
              test: /\.(png|jpe?g|gif|svg)$/i,
              type: 'asset',  // Use asset module to handle images
              generator: {
                //  filename: 'images/[name].[hash:8][ext]',  // This ensures hashed filenames for images
                  filename: 'images/[name][ext]',  // This ensures hashed filenames for images

             },
          },
      ],
  },
});