# barebones

A lightweight and skeletal WordPress boilerplate theme for HTML5 and beyond. There's lots of these out there but most themes include lots of bloat and files which you might not necessarily need, so we thought we would create my own which is great as a starting point with powerful features to encourage rapid development for most projects.

## Features

* Reset, normalisation and base font/form styles
* Sass Boilerplate - semantically named files, organised by folders, all compiled into a single file
* Semantic use of HTML5 elements, includes Google HTML5 shiv
* WAI-ARIA role ready
* Comes pre-bundled with cached CDN version of jQuery
* jQuery plugin agnostic
* Laravel Elixir to define/customize and run basic Gulp tasks
* Basic template files
* Customised functions.php adding theme support for high customisation
* Minimised HTTP requests for high Web Performance
* Localised strings for multiple language support
* Sass compiling and watching, css minification and live reload support

## Installation

Clone the barebones repositories into your WordPress /wp-content/themes/ directory:

    git clone https://github.com/benchmarkstudios/barebones
    cd barebones

To include all its optional submodules ([Simple Grid](https://github.com/benchmarkstudios/simple-grid) included):

    git submodule init
    git submodule update

#### Dependencies

* [Node.js](http://nodejs.org)
* [Gulp](http://gulpjs.com)

### Using Gulp and Laravel Elixir

Install Gulp as a global NPM package, if you don't have it already on your machine:

    npm install --global gulp

Install Laravel Elixir:

    npm install

Edit your gulpfile.js adding the required tasks (check the [Laravel Elixir](http://laravel.com/docs/master/elixir) documentation for further information).

Then run:

    gulp

*to compile*

    gulp watch 

*to watch*

    gulp --production 

*to minify*

This will execute all the Gulp tasks on the gulpfile.js.

## WordPress Support

Compatible with WordPress 3.2 and above, but always use the latest version.

## Browser Support

* Internet Explorer 8.0+
* Firefox 3.0+
* Safari 4.0+
* Chrome 14.0+
* Opera 10.0+
