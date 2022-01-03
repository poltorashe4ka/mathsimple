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

const webpack = require('webpack');
// const mix = require('laravel-mix');
const gulp = require("gulp");
require('laravel-mix-polyfill');
require('custom-env').env('', './');

mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            wNumb: "wnumb",
            "window.jQuery": "jquery",
        })
    ]
});

/*
 * Mix settings
 */
mix.options({
    processCssUrls: false,
    postCss: [
        require('autoprefixer')({
            browsers: [
                'last 2 versions',
                'ie 11'
            ],
            cascade: false
        })
    ]
});

mix.disableNotifications();

mix.browserSync({
    'proxy': process.env.MIX_APP_URL,
    'port': process.env.MIX_APP_PORT || 3210,
    'open': false
});

/*
 * Desktop Scripts
 */
mix.copyDirectory('resources/assets/frontend/js', 'public/js');
mix.copyDirectory('resources/assets/frontend/css', 'public/css');
mix.styles([
    'resources/assets/frontend/scss/app.scss'
], 'public/css/app.css');
/*
 * Sources copy
 */
mix.copyDirectory('resources/assets/frontend/img', 'public/img');
mix.copyDirectory('resources/assets/fonts', 'public/fonts');

/*
 * Admin Styles
 */

//admin
mix.styles([
    'resources/assets/admin/sass/bootstrap.css',
    'resources/assets/admin/sass/bootstrap-datetimepicker.min.css',
    'resources/assets/admin/sass/app.css'
], 'public/css/admin.css');

mix.babel([
    'resources/admin/js/jquery-1.11.3.min.js',
    'resources/admin/js/moment.min.js',
    'resources/admin/js/moment-locales-ru.js',
    'resources/admin/js/bootstrap.js',
    'resources/admin/js/bootstrap-datetimepicker.min.js',
    'resources/admin/js/jquery-ui-sortable.min.js',
    'resources/admin/js/app.js'
], 'public/js/admin.js').sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
