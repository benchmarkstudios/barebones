        <footer class="footer" role="contentinfo">
            <div class="container">
                <?php wp_nav_menu(['theme_location' => 'footer', 'menu_class' => 'nav nav--footer']); ?>
                &copy; <?php bloginfo( 'name' ); ?> <?php echo date( 'Y' ); ?>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>
