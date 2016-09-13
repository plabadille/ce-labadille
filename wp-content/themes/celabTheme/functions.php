<?php

// Menus de navigation
register_nav_menus(array(
'header' => 'Menu principal (header)',
'mobileMenu' => 'Menu mobile principal (header)'
));

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}