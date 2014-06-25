<?php get_header(); ?>

<div class="inner">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();

        $fullLink = wp_get_attachment_image_src( $post->ID, "full");
        $largeLink = wp_get_attachment_image_src( $post->ID, "large");
        $altText = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
        echo '<a href="' . $fullLink[0] . '" title="See full version">' .
                '<img src="'. $largeLink[0] .'" alt="'. $altText .'" class="full-width"/>'.
        '</a>';
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
