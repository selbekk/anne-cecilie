<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <title><?php the_title(); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/shared.css" />

    <!-- Wordpress -->
    <?php wp_head(); ?>
</head>
<body>
    <?php
    $backgroundCss = "";

    if ( have_posts() ) : while ( have_posts() ) : the_post();
        if(get_the_post_thumbnail() != '') {
            $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
            $backgroundCss = " style=\"background-image: url($thumb_url)\"";
        }
    endwhile;

    endif;

    ?>
<div class="site-wrapper background-image modeling"<?php echo $backgroundCss; ?>>
    <div class="site-wrapper-inner">
        <div class="masthead-wrapper">
            <div class="masthead clearfix">
                <h3 class="masthead-brand">
                    <a href="/">ukkelberg</a>
                </h3>

                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'main-menu',
                        'menu' => 'main-menu',
                        'container_class' => 'main-navigation hidden-xs',
                        'menu_class' => 'nav masthead-nav'
                    )
                );

                ?>
            </div>
        </div>
        <div class="cover-container">
            <div class="inner cover">
