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
* Base mobile nav out of the box

## Installation

Clone the barebones repositories into your WordPress /wp-content/themes/ directory:

    git clone https://github.com/benchmarkstudios/barebones
    cd barebones

### Using Laravel Mix

Install Dependencies, you have haven't done yet:

    npm install

Then run:

| Tasks                     |                                                                    |
|---------------------------|--------------------------------------------------------------------|
| `npx mix watch`           | *watch assets for changes*                                         |
| `npx mix --production`    | *compile for production*                                           |