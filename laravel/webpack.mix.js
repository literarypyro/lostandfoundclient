const mix = require('laravel-mix');
const path = require('path');

// Compile JS and CSS files
//mix.js('resources/js/app.js', 'public/js').vue({ version: 3 })

mix.js('resources/js/test.js', 'public/js').version();

mix.copy('resources/js/ssr.js', 'bootstrap/ssr/ssr.js');

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 3 })
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer'),
        require('postcss-import'),
    ]).version();




    // Aliases for components and images
mix.alias({
    '@components': path.resolve(__dirname, 'resources/js/components'),
    '@images': path.resolve(__dirname, 'resources/images'),
});




// Copy images from resources to public
//mix.copy('resources/images', 'public/images');

// Configure Webpack to handle image assets
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset/resource', // Use asset module to handle images
                generator: {
                    filename: 'images/[name][ext]', // Output images to the 'images' folder in public
                },
            },
        ],
    },
    output: {
        publicPath: '/lostandfound/laravel/public',
        chunkFilename: 'js/[name].js?[chunkhash]',
        module: true, // Enable module output for ESM support

    },
    experiments: {
        outputModule: true, // Enable output module for ESM
    },
});

