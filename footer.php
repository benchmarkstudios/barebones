        <footer class="footer" role="contentinfo">
            <div class="container">
                <div class="row">
                    <div class="col col--lg-3 col--md-3 col--sm-12 col--xs-12">
                        <p class="footer__copyright">&copy; <?php echo get_bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
                    </div>
                    <div class="col col--lg-8 col--lg-offset-1 col--md-8 col--md-offset-1 col--sm-12 col--xs-12">
                        <nav class="footer__navigation">
                            <?php wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'nav nav--footer']); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
