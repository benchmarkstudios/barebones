<?php

/**
 * Template name: Test - Responsive
 */

function moar_styles() {
  wp_enqueue_style( 'tests', get_template_directory_uri() . '/tests/css/tests.css' );
  wp_enqueue_style( 'icons', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', null, '4.3.0' );
}

add_action( 'wp_enqueue_scripts', 'moar_styles' );

get_header();

?>

<div class="container">
<section class="section">
  <h2 class="section__title">Responsive</h2>
  <div class="visible-lg hidden-md hidden-sm hidden-xs">Visible on large breakpoint or greater</div>
  <div class="hidden-lg visible-md hidden-sm hidden-xs">Visible between medium and large breakpoint</div>
  <div class="hidden-lg hidden-md visible-sm hidden-xs">Visible between small and medium breakpoint</div>
  <div class="hidden-lg hidden-md hidden-sm visible-xs">Visible on small breakpoint or less</div>
</section>
</div>

<?php get_footer(); ?>