<?php get_header(); ?>

<div class="content">

	<div class="container">

		<main class="main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>

				<header role="heading">
					<h3 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="post__date"><time><?php echo human_time_diff( strtotime( $post->post_date ) ); ?></time></p>
					<p class="post__comments"><?php comments_popup_link( __( 'No comments yet' ), __( '1 comment' ), __( '% comments' ) ); ?></p>
				</header>

				<?php the_content( __( 'Read More' ) ); ?>

			</article>

			<?php endwhile; ?>

			<?php 
			echo paginate_links(array(
	      'base'    => str_replace( 99999999, '%#%', esc_url( get_pagenum_link( 99999999 ) ) ),
	      'format'  => '?paged=%#%',
	      'current' => max( 1, get_query_var('paged') ),
	      'total'   => $jobs->max_num_pages
	    )); 
	    ?>

		</main>

		<aside class="sidebar">
			<?php get_sidebar(); ?>
		</aside>

	</div>

</div>

<?php get_footer(); ?>