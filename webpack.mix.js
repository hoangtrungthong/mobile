const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/guest.js", "public/js")
    .js("resources/js/home.js", "public/js")
    .js("resources/js/product.js", "public/js")
    .js("resources/js/users.js", "public/js")
    .js("resources/js/append.js", "public/js")
    .js("resources/js/chart.js", "public/js")
    .js("resources/js/orders.js", "public/js")
    .js("resources/js/category.js", "public/js")
    .js("resources/js/discount.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .copy("node_modules/chart.js/dist/Chart.js", "public/js");
