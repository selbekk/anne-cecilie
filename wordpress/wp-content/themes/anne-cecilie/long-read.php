<?php
/*
Template Name: Long article page
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="text-scroller">
                    <h1 class="cover-heading"><?php the_title(); ?></h1>

                    <?php the_content(); ?>
                </div>
            </div>
        </div>

<?php endwhile; ?>

<?php get_footer(); ?>