<?php get_header(); ?>

<div class="content container">

	<div class="main">

		<?php while ( have_posts() ) : the_post(); ?>
        
        <article <?php post_class(); ?>>
        	
            <header>
            	<h1 class="title"><?php the_title(); ?></h1>
            	<p class="date"><time pubdate datetime="<?php echo $post->post_date; ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></p>
            </header>
            
            <?php the_content( __( 'Read More' ) ); ?>
        
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