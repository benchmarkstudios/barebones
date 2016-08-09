<?php get_header(); ?>

<main class="main" role="main">
    <div class="container">

        <?php while (have_posts()) : the_post(); ?>

            <article <?php post_class(); ?>>

                <header class="post__header" role="heading">
                    <h3 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post__date"><time><?php echo human_time_diff(strtotime($post->post_date)) . ' ' . __('ago'); ?></time></p>
                    <p class="post__comments"><?php comments_popup_link(__('No comments yet'), __('1 comment'), __('% comments')); ?></p>
                </header>

                <?php the_content(__('Read More')); ?>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
