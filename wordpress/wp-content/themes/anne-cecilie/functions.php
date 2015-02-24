<?php

/* Register menus */

function register_menus() {
    register_nav_menus(
        array(
            'main-menu' => 'Main menu',
            'small-menu' => 'Mobile menu'
        )
    );
}
add_action('init', 'register_menus');

/* Register content types */

function register_content_types() {

}
add_action('init', 'register_content_types');


/* Register custom image sizes for gallery thumbnails */
add_image_size( 'lg-thumb', '500', '500', true );
add_image_size( 'lg-thumbnail', '500', '500', true );

/* Override the way the gallery is layed out */

add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string, $attr){

    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment', 'orderby' => 'post__in'));

    $numColumns = 4; // default value
    if(isset($attr['columns'])) {
        $numColumns = abs($attr['columns']);
    }

    if($numColumns == 0) {
        $numColumns = 1; // let's not divide by zero
    };

    $numColumnsClass = ceil(12 / $numColumns);

    $output = '<div class="gallery-wrapper row">';

    if(isset($attr['heading'])) {
        $output .= '<h2>'. $attr['heading'] .'</h2>';
    }

    $count = 0;
    foreach($posts as $imagePost) {

        $imageElem = wp_get_attachment_image($imagePost->ID, 'lg-thumb');
        $link = get_attachment_link( $imagePost->ID );
        $fullImageSrc = wp_get_attachment_image_src($imagePost->ID, 'large')[0];


        $output .=  '<div class="gallery-item col-xs-'. $numColumnsClass .'" data-full-url="'. $fullImageSrc .'">' .
                        '<a href="'. $link .'" title="Click to enhance">' .
                            $imageElem .
                            '<p class="caption">'. $imagePost->post_excerpt .'</p>' .
                        '</a>' .
                    '</div>';

        if($count++ != 0 && $count % $numColumns == 0) {
            $output .= '<div class="clearfix"></div>';
        }
    }

    $output .= "</div>";

    return $output;
}



/* Registering theme support for stuff */

add_theme_support( 'post-thumbnails' );


?>
