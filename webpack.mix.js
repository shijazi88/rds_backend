const mix = require("laravel-mix");
const $ = require("jquery");
global.$ = global.jQuery = $;
// mix.js("resources/js/app.js", "build/public/js");

mix.js("resources/js/app.js", "public/js").sass(
    "resources/scss/app.scss",
    "build/public/css"
);
