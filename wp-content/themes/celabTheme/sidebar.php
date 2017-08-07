<aside id="sidebar">
    <ul>
    	<li id="cartWoocommerce">
            <h3>Panier</h3>
    		<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo ' ' . sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    	</li>
        <li id="search">
            <h3>Rechercher dans le site</h3>
            <?php include(TEMPLATEPATH . '/searchform.php'); ?>
        </li>
        <li id="newProduct"> <?php echo do_shortcode('[latest-product-carousel]'); ?></li>
        <li id="starProduct"> <?php echo do_shortcode('[featured-product-carousel]'); ?></li>
    </ul>
</aside>