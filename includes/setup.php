<?php

/**
 * Theme setup and cleanup
 * 
 * @return void
 */

function theme_setup() {

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for document title tag
    add_theme_support( 'title-tag' );

    // Add Thumbnail Theme Support
    add_theme_support( 'post-thumbnails' );
    // add_image_size( 'custom-size', 700, 200, true );

    // Localisation Support
    load_theme_textdomain( 'barebones', get_template_directory() . '/languages' );

    // Hide admin bar
    add_filter( 'show_admin_bar', '__return_false' );

    // Remove comments feed
    add_filter('post_comments_feed_link', '__return_false');

    // Clean up head
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
    remove_action('wp_footer', 'wp_enqueue_global_styles', 1);    

}

add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Remove unnecessary scripts
 *
 * @return void
 */

function deregister_scripts() {
    wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'deregister_scripts' );


/**
 * Remove unnecessary styles
 *
 * @return void
 */

function deregister_styles() {
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_print_styles', 'deregister_styles', 100 );