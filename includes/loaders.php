<?php

/**
 * Enqueue scripts
 *
 * @return void
 */

function barebones_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js', ['jquery'], '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'barebones_enqueue_scripts' );


/**
 * Enqueue styles
 *
 * @return void
 */

function barebones_enqueue_styles() {
    wp_enqueue_style( 'bb-styles', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'barebones_enqueue_styles' );


/**
 * Move jQuery script to footer
 *
 * @return void
 */

function barebones_move_jquery_to_footer() {
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}

add_action( 'wp_enqueue_scripts', 'barebones_move_jquery_to_footer' );


/**
 * Add async and defer attributes to enqueued scripts
 *
 * @param string $tag
 * @param string $handle
 * @param string $src
 * @return void
 */

function barebones_defer_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$defer_scripts = [
        'SCRIPT_ID'
    ];

    // Find scripts in array and defer
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" defer="defer"></script>' . "\n";
    }
    
    return $tag;
} 

add_filter( 'script_loader_tag', 'barebones_defer_scripts', 10, 3 );