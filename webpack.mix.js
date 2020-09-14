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

mix.styles([
    'resources/plugins/select2/css/select2.min.css',
    'resources/plugins/fontawesome-free/css/all.min.css',
    'resources/plugins/fontawesome-free/css/v4-shims.css',
    'resources/css/ionicons.min.css',
    'resources/css/menu.css',
    'resources/dist/css/adminlte.min.css',
    'resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/plugins/datatables-bs4/css/dataTables.bootstrap4.css',
    'resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
    'resources/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
    'resources/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
    'resources/plugins/daterangepicker/daterangepicker.css',
    'resources/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css',
    'resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/plugins/dateselector/css/dateselector.css'
], 'public/css/file.css');

mix.scripts([
    'resources/plugins/jquery/jquery.min.js',
    'resources/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/dist/js/adminlte.min.js',
    'resources/dist/js/demo.js',
    'resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/plugins/datatables/jquery.dataTables.min.js',
    'resources/plugins/datatables-bs4/js/dataTables.bootstrap4.js',
    'resources/plugins/select2/js/select2.full.min.js',
    'resources/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js',
    'resources/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    'resources/plugins/moment/moment.min.js',
    'resources/plugins/inputmask/min/jquery.inputmask.bundle.min.js',
    'resources/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js',
    'resources/plugins/daterangepicker/daterangepicker.js',
    'resources/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
    'resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/plugins/dateselector/js/jquery.dateselector.js'
], 'public/js/file.js');

mix.copy('resources/img', 'public/img');
mix.copy('resources/plugins/fontawesome-free/webfonts', 'public/webfonts');

mix.copy('resources/fonts', 'public/fonts');
