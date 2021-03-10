const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.disableSuccessNotifications();
mix.setPublicPath('public');
mix.setResourceRoot('../');
mix.sourceMaps(false, 'source-map');
// mix.browserSync('localhost:8000');

mix.sass('./assets/styles/style.scss', 'styles/style.css')
    .options({
    postCss: [
        tailwindcss('./tailwind.config.js'),
        require('autoprefixer'),
        require('postcss-custom-properties')
    ]
}).sass('./assets/styles/tailwind.scss', 'styles/tailwind.css');

mix.js('./assets/scripts/index.js', 'scripts/app.js');