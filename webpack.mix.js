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

// mix.js('resources/js/app_vue.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.setPublicPath("public");
mix.disableNotifications();


mix.styles([
    "resources/app-assets/vendors/vendors.min.css",
    "resources/css/admin/themes/vertical-menu-nav-dark-template/materialize.css",
    "resources/css/admin/themes/vertical-menu-nav-dark-template/style.css",
    "resources/css/admin/pages/login.css",
    "resources/css/admin/custom/custom.css",
    "resources/css/vendors/sweetalert/sweetalert.css",
], "public/css/admin/app.css");

mix.scripts([
    "resources/js/admin/vendors.min.js",
    "resources/js/admin/plugins.js",
    "resources/js/admin/custom/custom-script.js",
    "resources/js/admin/scripts/ui-alerts.js",
    'resources/js/app.js',
    'resources/js/vendors/sweetalert/sweetalert.min.js',
    'resources/js/admin/scripts/extra-components-sweetalert.js',
    // 'resources/js/admin/scripts/advance-ui-modals.js',
    'resources/js/admin/scripts/form-elements.js',
], "public/js/admin/app.js");

mix.scripts([
    "resources/js/admin/vendors.min.js",
    "resources/js/admin/plugins.js",
    "resources/js/admin/custom/custom-script.js",
], "public/js/admin/login.js");

mix.styles([
], "public/css/public/app.css");

mix.scripts([
], "public/js/public/app.js");
