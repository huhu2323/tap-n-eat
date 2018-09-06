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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');


mix.styles(['resources/assets/vendor/bootstrap/css/bootstrap.min.css',
	'resources/assets/vendor/font-awesome/css/font-awesome.min.css',
	'resources/assets/vendor/linearicons/style.css',
	'resources/assets/vendor/chartist/css/chartist-custom.css',
	'resources/assets/css/main.css',
	'resources/assets/vendor/toastr/toastr.min.css',
	'resources/assets/css/custom.css'
	],

	'public/assets/css/app.css');

mix.scripts(['resources/assets/vendor/jquery/jquery.min.js',
	'resources/assets/vendor/bootstrap/js/bootstrap.min.js',
	'resources/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js',
	'resources/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js',
	'resources/assets/vendor/chartist/js/chartist.min.js',
	'resources/assets/scripts/klorofil-common.js',
	'resources/assets/vendor/toastr/toastr.min.js',
	'resources/assets/vendor/sweetalert/sweetalert2.js',
	'resources/assets/vendor/interact/interact.min.js',
	'resources/assets/js/custom.js'
	],

	'public/assets/js/app.js');
