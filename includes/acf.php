<?php

// Disable field editing on staging or production

if ( wp_get_environment_type() !== 'development' ) {

    // Only allow fields to be edited on development
    add_filter( 'acf/settings/show_admin', '__return_false' );

}