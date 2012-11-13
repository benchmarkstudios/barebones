<?php get_header(); ?>

<div class="content container">

	<div class="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>

			<header>
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="date"><time pubdate datetime="<?php echo $post->post_date; ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></p>
				<p class="comments"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments' ); ?></p>
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