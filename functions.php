<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'post' ) ); 
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_post_type_support( 'page', 'excerpt' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

if ( function_exists( 'register_sidebar' ) )
	register_sidebar();