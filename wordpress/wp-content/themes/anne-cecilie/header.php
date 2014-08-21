<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="anne cecilie ukkelberg, ac ukkelberg, model, modell, actor, skuespiller, singer">
    <?php
    $backgroundCss = "";

    if ( have_posts() ) : while ( have_posts() ) : the_post();
        if(get_the_post_thumbnail() != '') {
            $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0];
            $backgroundCss = " style=\"background-image: url($thumb_url)\"";
        }

        $site_name = get_bloginfo('name');
        $title = "";
        if(is_front_page()) {
            $title = $site_name;
        }
        else {
            $title = get_the_title() . " - " . $site_name;
        }
        $description = get_the_excerpt();

    endwhile;

    endif;

    ?>
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $thumb_url; ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:site_name" content="<?php echo $site_name; ?>">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/shared.css" />

    <!-- Wordpress -->
    <?php wp_head(); ?>
</head>
<body>

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
                <div class="menu-trigger visible-xs"><span class="glyphicon glyphicon-align-justify"></span></div>
            </div> <!-- end .masthead -->
        </div> <!-- end .masthead-wrapper -->
        <div class="cover-container">
            <div class="inner cover">
