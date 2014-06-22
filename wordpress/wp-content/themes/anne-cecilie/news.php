<?php
/*
Template Name: Blog page
*/
?>

<?php get_header(); ?>

    <div class="inner">
        <?php
        $temp = $wp_query; $wp_query= null;
        $wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
        if(!$wp_query->have_posts()) {
            get_template_part("content", "none");
        }
        else {
        while ($wp_query->have_posts()) { $wp_query->the_post();
            get_template_part("content", get_post_format());
        }

        if ($paged > 1) {
            ?>

            <nav id="nav-posts">
                <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
            </nav>

        <?php } else { ?>

            <nav id="nav-posts">
                <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
            </nav>

        <?php } /* end if paged */ ?>

        <?php } /* end if have posts */ ?>

        <?php wp_reset_postdata(); ?>

    </div>

<?php get_footer(); ?>
