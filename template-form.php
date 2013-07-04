<?php 

/* Template name: Form */

get_header(); 

?>

<div class="content container">

	<div class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?>>

			<header role="heading">
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="date"><time pubdate datetime="<?php echo $post->post_date; ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></p>
				<p class="comments"><?php comments_popup_link( 'No comments yet', '1 comment', '% comments' ); ?></p>
			</header>

			<?php the_content( __( 'Read More' ) ); ?>

			<form class="bs-docs-example form-horizontal">
            <div class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <div class="controls">
                <input type="text" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <label class="checkbox">
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
            <p><button type="submit" class="btn">Sign in</button></p>
          </form>

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