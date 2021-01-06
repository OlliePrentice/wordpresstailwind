const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.disableSuccessNotifications();

mix.postCss('./assets/styles/style.css', './style.css',
    [
        tailwindcss('./tailwind.config.js'),
        require('postcss-mixins'),
        require('postcss-nested'),
        require('autoprefixer')
    ]
);

mix.js('./assets/scripts/index.js', './assets/scripts/app.js');
