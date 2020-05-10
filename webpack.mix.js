let mix = require('laravel-mix');

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

mix
    .webpackConfig({
      resolve: {
          modules: [
              'node_modules'
          ]
      },
      module: {
          rules: [
            {
              test: /\.scss/,
              loader: 'import-glob-loader'
            }
          ]
      },
      devtool: 'source-map'
    })
    .js('assests/js/main.js', 'assests/dist/js/')
    .sass('assests/sass/main.scss', 'assests/dist/css/')
    .options({
      processCssUrls: false
    })

    .browserSync({
      files: ['assets/dist/js/*.js', 'assets/dist/css/*.css', '*.php'],
      port: 3000,
      proxy: 'http://localhost/SoccerSitetoWordpress',
      watch: true
    });