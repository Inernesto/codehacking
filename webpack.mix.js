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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles('resources/css/libs/blog-post.css', 'public/css/blog-post.css')

    .styles('resources/css/libs/bootstrap.css', 'public/css/bootstrap.css')

    .styles('resources/css/libs/bootstrap.min.css', 'public/css/bootstrap.min.css')

    .styles('resources/css/libs/font-awesome.css', 'public/css/font-awesome.css')

    .styles('resources/css/libs/metisMenu.css', 'public/css/metisMenu.css')

    .styles('resources/css/libs/sb-admin-2.css', 'public/css/sb-admin-2.css')

    .styles('resources/css/libs/styles.css', 'public/css/styles.css')


	.scripts('resources/js/libs/bootstrap.js', 'public/js/bootstrap.js')

	.scripts('resources/js/libs/bootstrap.min.js', 'public/js/bootstrap.min.js')

	.scripts('resources/js/libs/jquery.js', 'public/js/jquery.js')

	.scripts('resources/js/libs/metisMenu.js', 'public/js/metisMenu.js')

	.scripts('resources/js/libs/sb-admin-2.js', 'public/js/sb-admin-2.js')

	.scripts('resources/js/libs/scripts.js', 'public/js/scripts.js');

