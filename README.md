# barebones

A lightweight and skeletal WordPress boilerplate theme for HTML5 and beyond. Great as a starting point with powerful features to encourage rapid development for most projects.

## Features

* Reset, normalisation and base font/form styles
* Adaptive at certain breakpoints and responsive through the middle
* Sass powered - semantically named files all compiled into a single file
* Semantic use of HTML5 elements, includes Google HTML5 shiv
* WAI-ARIA role ready
* Proprietary baseline and customisable, Sass generated horizontal grid
* Comes pre-bundled with cached CDN version of jQuery
* jQuery plugin agnostic
* Basic index.php Loop template
* Customised functions.php adding theme support for high customisation
* Minimised HTTP requests for high Web Performance
* Localised strings for multiple language support
* Grunt.js integration - automatic image optimisation, Sass compiling and watching, and css minification

## Installation

### Dependencies

* Node.js
* Grunt.js

Clone/download the barebones repositories into your WordPress /wp-content/themes/ directory, then open /barebones/ in the command line and run `npm install` to install all of Grunt's dependancies.

Then run `grunt` to watch your Sass files.

## WordPress Support

Compatible with WordPress 3.2 and above.

## Browser Support

* Internet Explorer 7.0+
* Firefox 3.0+
* Safari 4.0+
* Chrome 14.0+
* Opera 10.0+


## Roadmap

* Phase out Internet Explorer 7 support
* Refactor CSS using `box-sizing: border-box`
