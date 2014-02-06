# barebones

A lightweight and skeletal WordPress boilerplate theme for HTML5 and beyond. There's lots of these out there but most themes include lots of bloat and files which you might not necessarily need, so I thought I'd create my own which is great as a starting point with powerful features to encourage rapid development for most projects.

## Features

* Reset, normalisation and base font/form styles
* Sass powered - semantically named files all compiled into a single file
* Semantic use of HTML5 elements, includes Google HTML5 shiv
* WAI-ARIA role ready
* Proprietary baseline and customisable, Sass generated, responsive horizontal grid
* Comes pre-bundled with cached CDN version of jQuery
* jQuery plugin agnostic
* Basic index.php Loop template
* Customised functions.php adding theme support for high customisation
* Minimised HTTP requests for high Web Performance
* Localised strings for multiple language support
* Gulp.js integration - automatic image optimisation, Sass compiling and watching, and css minification

## Installation

### Dependencies

* Node.js
* Gulp.js

Clone/download the barebones repositories into your WordPress /wp-content/themes/ directory, then open /barebones/ in a command line tool, such as Mac Terminal, and run the following to install all of this project's Gulp dependencies:

    npm install gulp-concat gulp-jshint gulp-imagemin gulp-rename gulp-sass gulp-uglify --save-dev

Then run `gulp` to run all your Gulp tasks. This includes watching the Sass folders.

## WordPress Support

Compatible with WordPress 3.2 and above.

## Browser Support

* Internet Explorer 8.0+
* Firefox 3.0+
* Safari 4.0+
* Chrome 14.0+
* Opera 10.0+


## Roadmap

* ~~Phase out Internet Explorer 7 support~~
* ~~Refactor CSS using `box-sizing: border-box`~~
