<?php

// Add support for useful stuff

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'post' ) ); 
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_post_type_support( 'page', 'excerpt' );

// Remove junk

add_filter('show_admin_bar', '__return_false');

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

function remove_comments_rss( $for_comments ) {
    return;
}

add_filter( 'post_comments_feed_link', 'remove_comments_rss' );

// jQuery the right way

function theme_scripts() {
  // If you need 'em
  // wp_enqueue_style( 'fonts', '//fonts.googleapis.com/css?family=Font+Family:Weight' );
  // wp_enqueue_style( 'icons', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/script.js', array( 'jquery' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Nav menus

if ( function_exists( 'register_nav_menus' ) )
  register_nav_menus(array(
    'header' => 'Header',
    'footer' => 'Footer'
  ));

function wp_nav_menu_args( $args = '' ) {
  $args['container']       = false;
  $args['container_class'] = false;
  $args['menu_id']         = false;
  $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';
  return $args;
}

add_filter( 'wp_nav_menu_args', 'wp_nav_menu_args' );
