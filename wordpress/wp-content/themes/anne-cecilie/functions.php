<?php

/* Theme functions will go here */

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

?>