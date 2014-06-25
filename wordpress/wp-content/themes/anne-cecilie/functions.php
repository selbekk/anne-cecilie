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
    // TODO: Now, create some content types bro!

}
add_action('init', 'register_content_types');


/* Register custom image sizes for gallery thumbnails */
add_image_size( 'lg-thumb', '500', '500', true );
add_image_size( 'lg-thumbnail', '500', '500', true );

/* Override the way the gallery is layed out */

add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string, $attr){

    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    $numColumns = 4; // default value
    if(isset($attr['columns'])) {
        $numColumns = abs($attr['columns']);
    }

    if($numColumns == 0) {
        $numColumns = 1; // let's not divide by zero
    };

    $numColumns = ceil(12 / $numColumns);

    $output = '<div class="gallery-wrapper row">';

    if(isset($attr['heading'])) {
        $output .= '<h2>'. $attr['heading'] .'</h2>';
    }

    foreach($posts as $imagePost){
        //print_r($imagePost); echo "<br /><br />"; // for debugging purposes - remove when working
        // TODO: create JS for lightbox
        $imageElem = wp_get_attachment_image($imagePost->ID, 'lg-thumb');
        $link = get_attachment_link( $imagePost->ID);

        $output .=  '<div class="gallery-item col-sm-'. $numColumns .'" data-id="'. $imagePost->ID .'">' .
                        '<a href="'. $link .'" title="Click to enhance">' .
                            $imageElem .
                            '<p class="caption">'. $imagePost->post_excerpt .'</p>' .
                        '</a>' .
                    '</div>';
    }

    $output .= "</div>";

    return $output;
}



/* Registering theme support for stuff */

add_theme_support( 'post-thumbnails' );


?>
