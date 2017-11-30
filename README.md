# barebones

A lightweight and skeletal WordPress boilerplate theme for HTML5 and beyond. There's lots of these out there but most themes include lots of bloat and files which you might not necessarily need, so we thought we would create our own which is great as a starting point with powerful features to encourage rapid development for most projects.

## Features

* Reset, normalisation and base font/form styles
* Scss Boilerplate - semantically named files, organised by folders, all compiled into a single file
* Semantic use of HTML5 elements, includes Google HTML5 shiv
* WAI-ARIA role ready
* jQuery plugin agnostic
* Basic template files
* Customised functions.php adding theme support for high customisation
* Minimised HTTP requests for high Web Performance
* Localised strings for multiple language support
* Scss compiling and watching, css minification support
* Rollup.js for js for smallest possible bundles
* Image optimisation using imagemin.
* Base mobile nav out of the box

## Installation

Clone the barebones repositories into your WordPress /wp-content/themes/ directory:

    git clone https://github.com/benchmarkstudios/barebones
    cd barebones

To include all its optional submodules ([Simple Grid](https://github.com/benchmarkstudios/simple-grid) included):

    git submodule init
    git submodule update

#### Dependencies

Install Dependencies:
```
  npm install
```

.. or with yarn:
```
  yarn
```

### Using Gulp

Install Gulp as a global NPM package, if you don't have it already on your machine:

    npm install --global gulp

Install Dependencies, you have haven't done yet:

    npm install

Then run:

| Tasks          |                                                                    |
|----------------|--------------------------------------------------------------------|
| `gulp`         | *to compile* (All tasks)                                           |
| `gulp watch`   | *to watch*                                                         |
| `gulp images`  | *to optimise images*                                               |
| `gulp styles`  | *to compile styles*                                                |
| `gulp scripts` | *to compile scripts*                                               |
| `gulp build`   | *to create a build (minification, removes map files and comments)* |

This will execute all the Gulp tasks on the gulpfile.babel.js.

### Configuration for Gulp

Some of the configuration can be done in `config.barebones.js` file, such as base source and public paths, along with scripts file paths for multiple bundles.

Of course, feel free to modify gulpfile itself.

### Images

Drop all your images into assets/images. When running gulp tasks, they will be automatically
optimised and output files will available in img folder in the root of the theme.

## WordPress Support

Compatible with WordPress 3.2 and above, but always use the latest version.

## Browser Support

* Internet Explorer 8.0+
* Firefox 3.0+
* Safari 4.0+
* Chrome 14.0+
* Opera 10.0+

## Tips & Tricks

### SVG Fallbacks

Most likely if you need to support IE8

*CSS*
```
...
background-size: 120px 15px;
background-image: url(/img/fallback.png);
background-image: linear-gradient(transparent, transparent), url(/img/image.svg);
...
```

*HTML*
```
<img src="/img/logo.svg" onerror="this.src='/img/logo.png'" alt="image" />
```
