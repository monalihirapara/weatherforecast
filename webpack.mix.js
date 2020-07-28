let mix = require('laravel-mix');

require('laravel-mix-purgecss');

/*
 |-----------------------------------------------------------------------------------
 | Mix Asset Management
 |-----------------------------------------------------------------------------------
 */

mix.react('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
      require('tailwindcss'),
      require('autoprefixer'),
    ]);

if (mix.inProduction()) {
  mix.version().purgeCss();
}
