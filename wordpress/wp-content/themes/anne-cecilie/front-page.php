<?php get_header('front-page'); ?>

<?php while ( have_posts() ) : the_post(); /* ze loop */ ?>

<h1 class="cover-heading"><?php bloginfo('description'); ?></h1>

    <?php the_content(); ?>

<?php endwhile; /* end the loop */ ?>

<?php get_footer('front-page'); ?>
