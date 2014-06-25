<?php get_header(); ?>

<div class="inner">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

        $link = wp_get_attachment_image_src( $post->id, "full");
        $imgElem = wp_get_attachment_image( $post->id, "large");
        echo '<a href="' . $link[0] . '" title="See full version">' . $imgElem . '</a>';
        ?>

        <div class="image-meta">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></h3>
        </div>


        <?php

    endwhile;

else :
    get_template_part( 'content', 'none' );

endif;
?>

</div>

<?php get_footer(); ?>
