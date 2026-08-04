<?php

/**
 * TinyMCE
 *
 * @param array $buttons
 * @return void
 */

function barebones_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    $buttons[] = 'hr';

    return $buttons;
}

add_filter('mce_buttons_2', 'barebones_mce_buttons_2');


/**
 * TinyMCE styling
 *
 * @param array $settings
 * @return void
 */

function barebones_tiny_mce_before_init( $settings ) {
    $style_formats = [
        [
            'title' => 'Text Sizes',
            'items' => [
                [
                    'title'    => '2XL',
                    'selector' => 'span, p',
                    'classes'  => 'text-2xl'
                ],
                [
                    'title'    => 'XL',
                    'selector' => 'span, p',
                    'classes'  => 'text-xl'
                ],
                [
                    'title'    => 'LG',
                    'selector' => 'span, p',
                    'classes'  => 'text-lg'
                ],
                [
                    'title'    => 'MD',
                    'selector' => 'span, p',
                    'classes'  => 'text-md'
                ],
                [
                    'title'    => 'SM',
                    'selector' => 'span, p',
                    'classes'  => 'text-sm'
                ],
                [
                    'title'    => 'XD',
                    'selector' => 'span, p',
                    'classes'  => 'text-xs'
                ],                
            ]
        ]
    ];

    $settings['style_formats'] = json_encode($style_formats);
    $settings['style_formats_merge'] = true;

    return $settings;
}

add_filter('tiny_mce_before_init', 'barebones_tiny_mce_before_init');


/**
 * Add Front Page edit link to admin Pages menu
 */

function front_page_on_pages_menu() {
    global $submenu;
    if ( get_option( 'page_on_front' ) ) {
        $submenu['edit.php?post_type=page'][501] = array( 
            __( 'Front Page', 'barebones' ), 
            'manage_options', 
            get_edit_post_link( get_option( 'page_on_front' ) )
        ); 
    }
}

add_action( 'admin_menu' , 'front_page_on_pages_menu' );