<?php 

    /**
     * Template Name: Demo page template
     */

    get_header(); 

?>

<main class="main" role="main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>

                <header role="heading">
                    <h3 class="post__title"><?php the_title(); ?></h3>
                </header>

                <?php the_content(); ?>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>