// webpack.mix.js

const mix = require('laravel-mix');
const glob = require('glob');

// Define the blocks directory

const blocksDir = 'blocks';

// Config

mix.setPublicPath('./');

mix.webpackConfig({
    stats: {
        children: true
    },
    externals: {
      jquery: 'jQuery',
    }
});

mix.version();

// CSS

mix.
    sass('assets/styles/style.scss', 'style.css')
    .options({
        processCssUrls: false
    });

// JS

mix
    .js([          
        'assets/scripts/scripts.js'
    ], 'js/scripts.min.js');

// Scan block subdirectories for JS files to include

const blockScripts = glob.sync(`${blocksDir}/**/*.js`).filter(file => !file.endsWith('.min.js'));

// Compile individual JS files

blockScripts.forEach((filePath) => {
    const blockName = filePath.replace(/^.*[\\/]/, '').replace(/\.[^/.]+$/, '');
    mix.js(filePath, 'js/blocks');
});

// Compile block stylesheets to individual CSS files

glob.sync(`${blocksDir}/**/*.scss`).forEach(file => {
    let output = file.replace('.scss', '.css');
    mix.sass(file, 'css/blocks');
});