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

/*
    <script src="../../../global/js/Component.js"></script>
    <script src="../../../global/js/Plugin.js"></script>
    <script src="../../../global/js/Base.js"></script>
    <script src="../../../global/js/Config.js"></script>
 */

mix
//.sass('resources/assets/sass/app.scss', 'public/assets/css')
//.sass('resources/assets/sass/system.scss', 'public/assets/css')
    //.js('resources/assets/js/app.js', 'public/assets/js')
    .js('resources/assets/global/vendor/breakpoints/breakpoints.js', 'assets/global/vendor/breakpoints/breakpoints.js')
    .scripts([
        'resources/assets/global/vendor/babel-external-helpers/babel-external-helpers.js',
        'resources/assets/global/vendor/jquery/jquery.js',
        'resources/assets/global/vendor/popper-js/umd/popper.min.js',
        'resources/assets/global/vendor/bootstrap/bootstrap.js',
        'resources/assets/global/vendor/animsition/animsition.js',
        'resources/assets/global/js/Component.js',
    ], 'public/assets/js/login.js')
    .scripts([
        'resources/assets/global/vendor/babel-external-helpers/babel-external-helpers.js',
        'resources/assets/global/vendor/jquery/jquery.min.js',
        'resources/assets/global/vendor/popper-js/umd/popper.min.js',
        'resources/assets/global/vendor/bootstrap/bootstrap.js',
        'resources/assets/global/vendor/animsition/animsition.js',
        'resources/assets/global/vendor/mousewheel/jquery.mousewheel.js',
        'resources/assets/global/vendor/asscrollbar/jquery-asScrollbar.js',
        'resources/assets/global/vendor/asscrollable/jquery-asScrollable.js',
        'resources/assets/global/js/Component.js',
        'resources/assets/global/js/Plugin.js',
        'resources/assets/global/js/Base.js',
        'resources/assets/global/js/Config.js',
        'resources/assets/js/Section/Menubar.js',
        'resources/assets/js/Section/Sidebar.js',
        'resources/assets/js/Section/PageAside.js',
        'resources/assets/js/Plugin/menu.js',
        'resources/assets/js/site.js',
    ], 'public/assets/js/app.js')
    .styles([
        'resources/assets/global/css/bootstrap.min.css',
        'resources/assets/global/css/bootstrap-extend.min.css',
        'resources/assets/css/site/site.min.css',
        'resources/assets/global/css/login.css',
        'resources/assets/global/fonts/web-icons/web-icons.min.css',
        'resources/assets/global/fonts/brand-icons/brand-icons.min.css',
    ], 'public/assets/css/login.css')
    .styles([
        'resources/assets/global/css/bootstrap.min.css',
        'resources/assets/global/css/bootstrap-extend.min.css',
        'resources/assets/css/site/site.min.css',
        'resources/assets/global/vendor/animsition/animsition.css',
        'resources/assets/global/vendor/asscrollable/asScrollable.css',
        'resources/assets/global/vendor/switchery/switchery.css',
        'resources/assets/global/vendor/intro-js/introjs.css',
        'resources/assets/global/vendor/slidepanel/slidePanel.css.css',
        'resources/assets/global/vendor/flag-icon-css/flag-icon.css',
        'resources/assets/global/fonts/web-icons/web-icons.min.css',
        'resources/assets/global/fonts/brand-icons/brand-icons.min.css',
    ], 'public/assets/css/app.css')


        /*
        .scripts([
        'resources/assets/global/vendor/html5shiv/html5shiv.min.js',
        'resources/assets/global/vendor/media-match/media.match.min.js',
        'resources/assets/global/vendor/respond/respond.min.js',
        'resources/assets/global/vendor/breakpoints/breakpoints.js',
        'resources/assets/global/vendor/babel-external-helpers/babel-external-helpers.js',
        'resources/assets/global/vendor/jquery/jquery.js',
        'resources/assets/global/vendor/popper-js/umd/popper.min.js',
        'resources/assets/global/vendor/bootstrap/bootstrap.js',
        'resources/assets/global/vendor/animsition/animsition.js',
        'resources/assets/global/vendor/mousewheel/jquery.mousewheel.js',
        'resources/assets/global/vendor/asscrollbar/jquery-asScrollbar.js',
        'resources/assets/global/vendor/switchery/switchery.js',
        'resources/assets/global/vendor/intro-js/intro.js',
        'resources/assets/global/vendor/screenfull/screenfull.js',
        'resources/assets/global/vendor/slidepanel/jquery-slidePanel.js',
        'resources/assets/global/vendor/jquery-placeholder/jquery.placeholder.js',
        'resources/assets/global/js/Component.js',
        'resources/assets/global/js/Plugin.js',
        'resources/assets/global/js/Base.js',
        'resources/assets/global/js/Config.js',
        'resources/assets/js/Section/Menubar.js',
        'resources/assets/js/Section/Sidebar.js',
        'resources/assets/js/Section/PageAside.js',
        'resources/assets/js/Plugin/menu.js',
        'resources/assets/global/js/config/colors.js',
        'resources/assets/js/config/tour.js',
        'resources/assets/js/Site.js',
        'resources/assets/global/js/Plugin/asscrollable.js',
        'resources/assets/global/js/Plugin/slidepanel.js',
        'resources/assets/global/js/Plugin/switchery.js',
        'resources/assets/global/js/Plugin/jquery-placeholder.js',
        'resources/assets/global/js/Plugin/material.js',
    ], 'public/assets/js/login.js')
    //.sass('resources/assets/sass/app.scss', 'public/assets/css')
    //.sass('resources/assets/sass/system.scss', 'public/assets/css')
    .styles([
        'resources/assets/global/css/bootstrap.min.css',
        'resources/assets/global/css/bootstrap-extend.min.css',
        'resources/assets/global/css/login.css',
        'resources/assets/global/vendor/animsition/animsition.css',
        'resources/assets/global/vendor/asscrollable/asScrollable.css',
        'resources/assets/global/vendor/switchery/switchery.css',
        'resources/assets/global/vendor/intro-js/introjs.css',
        'resources/assets/global/vendor/slidepanel/slidePanel.css',
        'resources/assets/global/vendor/flag-icon-css/flag-icon.css',
        'resources/assets/global/fonts/web-icons/web-icons.min.css',
        'resources/assets/global/fonts/brand-icons/brand-icons.min.css',
        'resources/assets/css/site/site.min.css',
    ], 'public/assets/css/login.css')
         */
    //.sourceMaps()
    .browserSync('localhost:8000');

if (mix.inProduction()) {
    mix.version();
}

//.browserSync('localhost:8000') => npm run watch => roda em real time
