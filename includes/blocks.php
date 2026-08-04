<?php

/**
 * Define block categories
 */

add_filter('block_categories_all', function ($categories) {
    $categories[] = [
        'slug'  => 'custom-blocks',
        'title' => 'Custom Blocks'
    ];
    return $categories;
});


/**
 * Load frontend styles into block editor
 */

function editor_styles() {
    add_editor_style( 'style.css' );
}

add_action( 'after_setup_theme', 'editor_styles' );


/**
 * Load custom assets into admin area
 *
 * @return void
 */

function bb_enqueue_editor_assets() {
    $style = bb_get_asset_data( '/css/editor-styles.css' );

    wp_enqueue_style(
        'bb-editor-styles',
        $style['uri'],
        [],
        $style['version']
    );
}

add_action( 'enqueue_block_editor_assets', 'bb_enqueue_editor_assets' );


/**
 * Load block.json files programmatically
 *
 * @return void
 */

function bb_register_blocks() {
	$blocks = glob( get_stylesheet_directory() . '/blocks/*/block.json' );
	if ($blocks)
	{
		foreach($blocks as $block)
		{
			$res = register_block_type( $block );
		}
	}
}

add_action( 'init', 'bb_register_blocks' );


/**
 * Restrict the block editor to custom blocks
 *
 * @return void
 */

add_filter('allowed_block_types_all', function ($allowed_blocks, $editor_context) {
    // Check if we're in the post editor
    if (!empty($editor_context->post)) {
        // Get all ACF blocks
        $acf_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
        $acf_block_names = [];

        foreach ($acf_blocks as $block_name => $block) {
            if (strpos($block_name, 'custom-blocks/') === 0) {
                $acf_block_names[] = $block_name;
            }
        }

        return $acf_block_names;
    }

    return $allowed_blocks;
}, 10, 2);

/**
 * Versioning for block assets
 *
 * @return void
 */

function bb_block_asset_versioning( $src, $handle = '' ) {
    $theme_uri = get_template_directory_uri();

    if ( strpos( $src, $theme_uri ) !== 0 ) {
        return $src;
    }

    $relative_path = wp_normalize_path(
        str_replace(
            trailingslashit( $theme_uri ),
            '/',
            remove_query_arg( 'ver', $src )
        )
    );
    $asset         = bb_get_asset_data( $relative_path );
    $version       = $asset['version'] ? [ 'ver' => $asset['version'] ] : [];

    return add_query_arg( $version, remove_query_arg( 'ver', $asset['uri'] ) );

}

add_filter( 'style_loader_src', 'bb_block_asset_versioning', 10, 2 );
add_filter( 'script_loader_src', 'bb_block_asset_versioning', 10, 2 );


/**
 * Prevent inline styles, preferring to include the CSS files
 *
 * @return void
 */

add_filter( 'styles_inline_size_limit', '__return_zero' );


/**
 * Check if the current block is being previewed
 *
 * @return void
 */

function bb_is_block_preview($block) {
    return ! empty( $block['data']['preview'] );
}


/**
 * Return the path to the block preview image
 *
 * @return void
 */

function bb_block_preview_image_src($block) {
    if ( empty( $block['example']['attributes']['data']['preview'] ) ) {
        return '';
    }

    return get_stylesheet_directory_uri() . '/' . ltrim( $block['example']['attributes']['data']['preview'], '/' );
}
