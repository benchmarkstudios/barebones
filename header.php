<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body <?php body_class(); ?>>
        <header class="header" role="banner">
            <div class="container">
                <div class="row row--flex items-center">
                    <div class="col col--lg-3 col--md-3 col--sm-6 col--xs-6">
                        <a href="<?php echo get_bloginfo( 'url' ); ?>" class="header__logo">
                            <img src="<?php echo get_bloginfo( 'stylesheet_directory' ); ?>/img/logo.svg" alt="<?php echo get_bloginfo( 'title' ); ?>" width="200" />
                        </a>
                    </div>
                    <div class="col col--lg-8 col--lg-offset-1 col--md-8 col--md-offset-1 col--sm-6 col--xs-6 align-text-right">
                        <div class="header__navigation">
                            <nav role="navigation">
                                <?php wp_nav_menu(['theme_location' => 'header', 'menu_class' => 'nav nav--header']); ?>
                            </nav>
                        </div>
                        <a href="#" class="nav-burger js-menu-toggle">
                            <span class="nav-burger__line"></span>
                            <span class="nav-burger__line"></span>
                            <span class="nav-burger__line"></span>
                        </a>                        
                    </div>
                </div>
            </div>
        </header>
