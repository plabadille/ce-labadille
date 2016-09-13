<aside id="sidebar">
    <ul>
    	<li id="cartWoocommerce">
    		<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo ' ' . sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    	</li>
        <li id="search"><?php include(TEMPLATEPATH . '/searchform.php'); ?></li>
        <li id="calendar"><h2>Calendrier</h2> <?php get_calendar(); ?> </li>
    </ul>
</aside>