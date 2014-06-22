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

/* Registering theme support for stuff */

add_theme_support( 'post-thumbnails' );

?>
