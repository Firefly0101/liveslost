const mix = require('laravel-mix');

// The proxy for browser sync. Should match your localhost url for the project
const proxy = 'https://liveslost.fireflydigital.dev/';

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your theme. Compile the Sass for your front-end and editor
| css. Optionally compile JS here if you are using ES2016+ or web components
|
*/
mix.setPublicPath('assets')
    .sourceMaps()
    .disableNotifications()
    .options({
        processCssUrls: false,
    })
	.sass('src/scss/firefly.scss', 'css')
	.sass('src/scss/editor.scss', 'css')
	.js('src/js/firefly.js', 'js')

    // Copy FontAwesome Pro to assets directory
    .copy('node_modules/@fortawesome/fontawesome-pro/webfonts/', 'assets/webfonts')
    .copy('node_modules/@fortawesome/fontawesome-pro/css/all.min.css', 'assets/css/fontawesome-all.min.css')

    .browserSync({
        proxy: proxy,
        files: [
            './assets/css/*.css',
            './assets/js/*.js',
            '**/*.php',
            './views/**/*.twig'
        ]
    })
    .version();