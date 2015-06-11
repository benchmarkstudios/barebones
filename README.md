# barebones

A lightweight and skeletal WordPress boilerplate theme for HTML5 and beyond. There's lots of these out there but most themes include lots of bloat and files which you might not necessarily need, so we thought we would create my own which is great as a starting point with powerful features to encourage rapid development for most projects.

## Features

* Reset, normalisation and base font/form styles
* Sass powered - semantically named files all compiled into a single file
* Semantic use of HTML5 elements, includes Google HTML5 shiv
* WAI-ARIA role ready
* Comes pre-bundled with cached CDN version of jQuery
* jQuery plugin agnostic
* Browserify for modular JavaScript in the browser, stop those spaghetti files!
* Basic index.php Loop template
* Customised functions.php adding theme support for high customisation
* Minimised HTTP requests for high Web Performance
* Localised strings for multiple language support
* Sass compiling and watching, css minification and live reload support

## Installation

Run the following commands to include barebones and all it's submodules:

    git clone git@github.com:benchmarkstudios/barebones.git
    git submodule init
    git submodule update

### Dependencies

* [Node.js](http://nodejs.org)

#### Optional

* [LiveReload Chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei)

Clone/download the barebones repositories into your WordPress /wp-content/themes/ directory and run the following to install all of this project's Grunt dependencies:

    npm install

Then run:

    npm run watch

This will execute the default tasks: compiling sass/js and spawning the file watcher.

## WordPress Support

Compatible with WordPress 3.2 and above, but always use the latest version.

## Browser Support

* Internet Explorer 8.0+
* Firefox 3.0+
* Safari 4.0+
* Chrome 14.0+
* Opera 10.0+
