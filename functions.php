<?php

/* =Add support for missing cool stuff
-------------------------------------------------------------- */

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header' );
add_post_type_support( 'page', 'excerpt' );

/* =Remove gunk from <head>
-------------------------------------------------------------- */

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

/* =Register a sidebar for the lolz
-------------------------------------------------------------- */

if ( function_exists( 'register_sidebar' ) )
	register_sidebar();