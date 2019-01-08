        <footer class="footer" role="contentinfo">
            <div class="container">
                <nav class="footer__navigation">
                    <?php wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'nav nav--footer']); ?>
                </nav>
                <p class="footer__copyright">&copy; <?php echo get_bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
