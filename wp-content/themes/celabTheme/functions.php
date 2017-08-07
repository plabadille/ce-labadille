<?php

// Menus de navigation
register_nav_menus(array(
'header' => 'Menu principal (header)',
'mobileMenu' => 'Menu mobile principal (header)'
));

//on indique que le theme supporte woo-commerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
//return link of post with slug args
function get_link_by_slug($slug, $type = 'post'){
    $post = get_page_by_path($slug, OBJECT, $type);
    return get_permalink($post->ID);
}

//custom search excluding pages:
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', array('post','product'));
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

remove_filter('the_content', 'wptexturize');

//on nettoie le menu d'admin pour une utilisation client
function remove_menu_pages() {
    // remove_menu_page('tools.php'); //outils
    remove_menu_page('users.php'); //utilisateurs
    remove_menu_page('themes.php'); //apparence
    remove_menu_page('edit-comments.php'); // commentaires
    //remove_menu_page('manage_fmc'); //plugin ContactFormMaker
    remove_menu_page('edit.php?post_type=cfmemailverification'); //emailVerif ContactForm
    remove_menu_page('wpc-page-setting'); //plugin wooCarousel
    remove_menu_page('aps-social'); //plugin boutonsocial
    remove_menu_page('responsive-menu'); //plugin responsivMenu
}
add_action( 'admin_menu', 'remove_menu_pages' );

// nettoyage colonne articles admin
function clean_posts_column( $columns ) {
    unset($columns['comments']);
    return $columns;
}
add_filter( 'manage_edit-post_columns', 'clean_posts_column', 10, 1 );

//fonction donnant les liens de nos catégories perso
function get_proper_category_url( $categorySlug ) {
    switch ($categorySlug) {
        case 'partitionstabs':
            $categoryLink = "<a href=\"/partitions-tabs\" alt=\"".$categorySlug."\">Partitions Tabs</a>";
            break;
        case 'auteurs':
            $categoryLink = "<a href=\"/artistes\" alt=\"".$categorySlug."\">Artistes</a>";
            break;
        case 'chansonshumour':
            $categoryLink = "<a href=\"/chansons-humour\" alt=\"".$categorySlug."\">Chansons d'humour</a>";
            break;
        case '':
            $categoryLink = "<a href=\"/sample-page\" alt=\"produits\">Produits</a>";
            break;
    }
    return $categoryLink;
}