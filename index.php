<?php get_header(); ?>

<div class="content">

	<div class="container">

		<main class="main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>

				<header role="heading">
					<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="date"><time pubDate datetime="<?php echo $post->post_date; ?>"><?php echo human_time_diff( strtotime( $post->post_date ) ); ?></time></p>
					<p class="comments"><?php comments_popup_link( __( 'No comments yet' ), __( '1 comment' ), __( '% comments' ) ); ?></p>
				</header>

				<?php the_content( __( 'Read More' ) ); ?>

			</article>

			<?php endwhile; ?>

			<div class="pagination">
				<div class="alignleft"><?php previous_posts_link( __( 'Previous Entries' ) ) ?></div>
				<div class="alignright"><?php next_posts_link( __( 'Next Entries' ) ) ?></div>
			</div>

		</main>

		<aside class="sidebar">
			<?php get_sidebar(); ?>
		</aside>

	</div>

</div>

<?php get_footer(); ?>
