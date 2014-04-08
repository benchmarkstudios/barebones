<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title( '' ); ?></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <?php wp_head(); ?>
    <!--[if lt IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>
    <header class="header" role="banner">
      <div class="container">
        <nav role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'header' ) ); ?>
        </nav>
      </div>
    </header>
