const mix = require('laravel-mix');

mix
  .js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    require('autoprefixer'),
  ]);

// Hot reload
if (! mix.inProduction()) {
  mix.browserSync('localhost:8000')
  .disableSuccessNotifications();
}
