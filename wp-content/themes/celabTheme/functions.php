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

function get_link_by_slug($slug, $type = 'post'){
    $post = get_page_by_path($slug, OBJECT, $type);
    return get_permalink($post->ID);
}