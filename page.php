<?php get_header(); ?>

<div class="content container">

	<div class="main">

		<?php while ( have_posts() ) : the_post(); ?>
        
        <article <?php post_class(); ?>>
            
            <?php the_content(); ?>
        
        </article>
        
        <?php endwhile; ?>
        
        <div class="pagination">
            <div class="alignleft"><?php previous_posts_link( 'Previous Entries' ) ?></div>
            <div class="alignright"><?php next_posts_link( 'Next Entries','' ) ?></div>
        </div>
    
    </div>
    
    <aside class="sidebar">
    	<?php get_sidebar(); ?>
    </aside>

</div>

<?php get_footer(); ?>