<?php get_header(); ?>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
$plural = $total_results != 1 ? "s" : "";
?>

<h1 class="cover-heading search-heading">I found <?php echo $total_results; ?> hit<?php echo $plural; ?> for <span>"<?php the_search_query(); ?>"</span></h1>

<?php
while ( $wp_query->have_posts() ) {
    $wp_query->the_post();

    get_template_part("content", get_post_format());
}

?>

<?php get_footer(); ?>
