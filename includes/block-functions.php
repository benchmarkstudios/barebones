<?php

add_filter('block_categories_all', function ($categories) {
    $categories[] = [
        'slug'  => 'custom-blocks',
        'title' => 'Custom Blocks'
    ];
    return $categories;
});

/**
 * Load global stylesheet into block editor
 *
 * @return void
 */

function bb_enqueue_custom_global_css_in_block_editor() {
	wp_enqueue_style( 'bb-styles', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'enqueue_block_assets', 'bb_enqueue_custom_global_css_in_block_editor' );

/**
 * Load custom assets into admin area
 *
 * @return void
 */

function bb_enqueue_admin_scripts() {
    wp_enqueue_style( 'bb-editor-styles', get_stylesheet_directory_uri() . '/css/editor-styles.css' );
    wp_enqueue_script( 'bb-editor-scripts', get_stylesheet_directory_uri() . '/js/editor-scripts.min.js' );
}

add_action( 'admin_enqueue_scripts', 'bb_enqueue_admin_scripts' );

/**
 * Load block.json files programmatically
 *
 * @return void
 */

function bb_register_blocks() {

add_filter( 'should_load_separate_core_block_assets', '__return_false', 11 );

	$blocks = glob( get_stylesheet_directory() . '/blocks/*/block.json' );
	if ($blocks)
	{
		foreach($blocks as $block)
		{
			$res = register_block_type( get_template_directory() . '/blocks/split-content/block.json' );
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

function bb_block_asset_versioning( $src ) {

    try {

        if( strpos( $src, 'ver' ) !== false )
        {
            $src = remove_query_arg( 'ver', $src );

            $file = file_get_contents( get_template_directory() . '/mix-manifest.json');

            if ($file)
            {
                $manifest = json_decode($file);
                if ($manifest)
                {
                    foreach($manifest as $filename => $versioned)
                    {
               
                        if ( strpos($src, $filename) !== false )
                        {
                            $parsed = parse_url($versioned);
                            $version = $parsed['query'];
                        }
                    }
                }
            }

            return $src . '?' .$version;

        }

    } catch (Exception $e) {

        return $src;

    }

    return $src;

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
    return (isset($block['data']['preview']));
}


/**
 * Return the path to the block preview image
 *
 * @return void
 */

function bb_block_preview_image_src($block) {
    return get_stylesheet_directory_uri() . '/' . $block['example']['attributes']['data']['preview'];
}