const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.disableSuccessNotifications();
mix.setPublicPath('public');
mix.setResourceRoot('../');

mix.postCss('./assets/styles/style.css', 'styles/style.css',
    [
        tailwindcss('./tailwind.config.js'),
        require('postcss-mixins'),
        require('postcss-nested'),
        require('postcss-hexrgba'),
        require('postcss-variables'),
        require('postcss-custom-properties'),
        require('autoprefixer')
    ]
);


mix.js('./assets/scripts/index.js', 'scripts/app.js');
