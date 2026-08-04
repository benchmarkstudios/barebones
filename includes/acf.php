<?php

function acf_theme_setup() {

    // Only allow fields to be edited on development

    if ( wp_get_environment_type() !== 'development' ) {
        add_filter( 'acf/settings/show_admin', '__return_false' );
    }

}

add_action( 'after_setup_theme', 'acf_theme_setup' );
