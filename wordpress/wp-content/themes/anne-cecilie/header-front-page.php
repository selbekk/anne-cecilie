<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="anne cecilie ukkelberg, ac ukkelberg, model, modell, actor, skuespiller, singer">
    <?php
    $backgroundCss = "";
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            $site_name = get_bloginfo('name');
            $description = get_the_excerpt();
        }
    }
    if( class_exists('Dynamic_Featured_Image') ) {
        global $dynamic_featured_image;
        $featured_images = $dynamic_featured_image->get_featured_images(5);
    }

    ?>
    <meta property="og:title" content="<?php echo $site_name; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $thumb_url; ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:site_name" content="<?php echo $site_name; ?>">

    <title><?php echo $site_name; ?></title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/shared.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/frontpage.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />

    <!-- Wordpress -->
    <?php wp_head(); ?>
</head>
<body>

<div class="background-images">
    <?php
    foreach($featured_images as $image) {
        echo '<div class="bg-img" style="background-image: url('. $image['full'] .')"></div>';
    }
    ?>
</div>

<div class="site-wrapper">
    <div class="site-wrapper-inner <?php global $post;
    echo $post->post_name; ?>">
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
