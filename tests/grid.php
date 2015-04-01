<?php

/**
 * Template name: Test - Grid
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
    <h2 class="section__title">Columns</h2>
    <div class="row">
      <div class="col col--lg-12 col--md-2 col--sm-2 col--xs-12"><span>12</span></div>
    </div>
    <div class="row">
      <div class="col col--lg-6 col--md-6 col--sm-6 col--xs-12"><span>6</span></div>
      <div class="col col--lg-6 col--md-6 col--sm-6 col--xs-12"><span>6</span></div>
    </div>
    <div class="row">
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
    </div>
    <div class="row">
      <div class="col col--lg-3 col--md-3 col--sm-3 col--xs-12"><span>3</span></div>
      <div class="col col--lg-3 col--md-3 col--sm-3 col--xs-12"><span>3</span></div>
      <div class="col col--lg-3 col--md-3 col--sm-3 col--xs-12"><span>3</span></div>
      <div class="col col--lg-3 col--md-3 col--sm-3 col--xs-12"><span>3</span></div>
    </div>
    <div class="row">
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
      <div class="col col--lg-2 col--md-2 col--sm-2 col--xs-12"><span>2</span></div>
    </div>
    <div class="row">
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
      <div class="col col--lg-1 col--md-1 col--sm-1 col--xs-12"><span>1</span></div>
    </div>
  </section>
  <section class="section">
    <h2 class="section__title">Nesting</h2>
    <div class="row">
      <div class="col col--lg-5 col--md-5 col--sm-5 col--xs-12"><img src="//placehold.it/800x600" alt=""></div>
      <div class="col col--lg-7 col--md-7 col--sm-7 col--xs-12">
        <span>parent</span>
        <div class="row">
          <div class="col col--lg-6 col--md-6 col--sm-6 col--xs-12"><span>child</span></div>
          <div class="col col--lg-6 col--md-6 col--sm-6 col--xs-12"><span>child</span></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <h2 class="section__title">Gutterless</h2>
    <div class="row row--gutterless">
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
      <div class="col col--lg-4 col--md-4 col--sm-4 col--xs-12"><span>4</span></div>
    </div>
  </section>
</div>

<?php get_footer(); ?>