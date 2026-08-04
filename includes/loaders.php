<?php

/**
 * Return the versioned asset data for a theme file.
 *
 * @param string $relative_path Path relative to the theme root, with a leading slash.
 * @return array<string, string|null>
 */

function bb_get_asset_data( $relative_path ) {
    $relative_path = '/' . ltrim( $relative_path, '/' );
    $path          = get_stylesheet_directory() . $relative_path;
    return [
        'uri'     => get_stylesheet_directory_uri() . $relative_path,
        'version' => file_exists( $path ) ? (string) filemtime( $path ) : null,
    ];
}

/**
 * Enqueue frontend assets.
 *
 * @return void
 */

function barebones_enqueue_assets() {
    $style  = bb_get_asset_data( '/style.css' );
    $script = bb_get_asset_data( '/js/scripts.min.js' );

    wp_enqueue_style(
        'bb-styles',
        $style['uri'],
        [],
        $style['version']
    );

    wp_enqueue_script(
        'scripts',
        $script['uri'],
        [ 'jquery' ],
        $script['version'],
        [
            'strategy'  => 'defer',
            'in_footer' => true,
        ]
    );
}

add_action( 'wp_enqueue_scripts', 'barebones_enqueue_assets' );
