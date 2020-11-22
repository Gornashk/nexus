let mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const autoprefixer = require("autoprefixer");

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

mix.js("js/app.js", "public/js")
.options({
    processCssUrls: false,
    postCss: [autoprefixer(), tailwindcss("tailwind.config.js")]
})
.sass("scss/main.scss", "public/css")
.setPublicPath('public')
.browserSync('nexus.local');