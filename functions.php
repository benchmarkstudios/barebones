<?php

/**
 * Add support for useful stuff
 */

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['post'] ); 
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_post_type_support( 'page', 'excerpt' );



/**
 * Remove junk
 */
 
define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );

add_filter('show_admin_bar', '__return_false');

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function barebones_remove_comments_rss( $for_comments ) {
    return;
}

add_filter( 'post_comments_feed_link', 'barebones_remove_comments_rss' );



/**
 * jQuery the right way
 */

function barebones_scripts() {
  /*
   * For IE8 to play nice, you'll need to include your CSS here, for example:
   */
  // wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Font+Family' );
  // wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, '2.1.4', true );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/scripts.min.js', ['jquery'], null, true );
}

add_action( 'wp_enqueue_scripts', 'barebones_scripts' );



/**
 * Nav menus
 */

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus([
        'header' => 'Header',
        'footer' => 'Footer'
    ]);
}

function barebones_nav_menu_args( $args = '' ) {
    $args['container']       = false;
    $args['container_class'] = false;
    $args['menu_id']         = false;
    $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';
    return $args;
}

add_filter( 'wp_nav_menu_args', 'barebones_nav_menu_args' );



/**
 * Email
 */

function barebones_mail_from( $email ) {
    return get_option( 'admin_email' );
}

add_filter( 'wp_mail_from', 'barebones_mail_from' );


function barebones_mail_from_name( $name ) {
    return get_bloginfo( 'name' );
}

add_filter( 'wp_mail_from_name', 'barebones_mail_from_name' );



/**
 * Shortcodes ([button] shortcode included)
 */

function button_shortcode( $atts, $content = null ) {
    $atts['class']  = $atts['class'] ? $atts['class'] : 'btn';
    return '<a class="' . $atts['class'] . '" href="' . $atts['link'] . '">' . $content . '</a>';
}

add_shortcode( 'button', 'button_shortcode' );



/**
 * TinyMCE
 */

function barebones_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    $buttons[] = 'hr';
    return $buttons;
}

add_filter( 'mce_buttons_2', 'barebones_mce_buttons_2' );


function barebones_tiny_mce_before_init( $settings ) {
    $style_formats = [
        /* 
         * Example 
         *
        [
          'title'    => '',
          'selector' => '',
          'classes'  => ''
        ] */
    ];
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

add_filter( 'tiny_mce_before_init', 'barebones_tiny_mce_before_init' );



/**
 * Get image URL for whatever size.
 */

function wp_get_attachment_image_url( $id, $size = 'full', $attrs = []) {
    $image = wp_get_attachment_image_src( $id, $size, $attrs );
    return $image[0];
}



/**
 * Custom functions / External files
 */

require_once( 'functions/example.php' );