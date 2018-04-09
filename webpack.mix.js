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

mix.js('resources/assets/js/app.js' , 'public/js')
    .sass('resources/assets/sass/app.scss' , 'public/css')
    .sass('public/css/home.scss' , 'public/css')
    .copyDirectory('resources/assets/editor/js', 'public/js')
    .copyDirectory('resources/assets/editor/css', 'public/css');
if (mix.inProduction())
{
    mix.version();
}
mix.browserSync({
    host : '192.168.10.10' ,
    proxy : 'larabbs.test' ,    // apache或iis等代理地址
    open : false ,
    files : [
        'app/**/*.php' ,
        'resources/views/**/*.php' ,
        'packages/mixdinternet/frontend/src/**/*.php' ,
        'public/js/*.js' ,
        'public/css/*.css'
    ] ,
    watchOptions : {
        usePolling : true ,
        interval : 300
    }
});