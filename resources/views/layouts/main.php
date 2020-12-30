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

mix.styles('resources/css/libs/bootstrap.css', './public/css/bootstrap.css')

	.styles('resources/css/libs/bootstrap.min.css', './public/css/bootstrap.min.css')

	.styles('resources/css/libs/bootstrap-rtl.css', './public/css/bootstrap-rtl.css')

    .styles('resources/css/libs/bootstrap-rtl.min.css', './public/css/bootstrap-rtl.min.css')

	.styles('resources/css/libs/sb-admin.css', './public/css/sb-admin.css')
		
    .styles('resources/css/libs/sb-admin-rtl.css', './public/css/sb-admin-rtl.css')

    .styles('resources/font-awesome/css/font-awesome.min.css', './public/css/font-awesome.min.css')

		
	.scripts([
	
	'resources/js/libs/jquery.js',
	'resources/js/libs/bootstrap.js',
	'resources/js/libs/bootstrap.min.js'
], './public/js/libs.js');
