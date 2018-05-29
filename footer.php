        <footer class="footer" role="contentinfo">
            <div class="container">
                <nav class="nav nav--footer">
                    <?php wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'nav__list']); ?>
                </nav>
                &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
