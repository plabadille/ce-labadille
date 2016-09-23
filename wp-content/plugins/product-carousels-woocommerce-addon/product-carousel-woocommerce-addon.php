<?php

/*

Plugin Name: Product Carousels WooCommerce Addon

Plugin URI: http://www.netattingo.com/

Description: Using this plugin , we can add 'Featured Product Carousel' and  'Latest Product Carousel' in page using shortcodes.

Author: NetAttingo Technologies

Version: 1.0.0

Author URI: http://www.netattingo.com/

*/



define('WP_DEBUG',true);

define('WPC_DIR', plugin_dir_path(__FILE__));

define('WPC_URL', plugin_dir_url(__FILE__));

define('WPC_PAGE_DIR', plugin_dir_path(__FILE__).'pages/');

define('WPC_INCLUDE_URL', plugin_dir_url(__FILE__).'includes/');



//Include menu

function wpc_product_plugin_menu() {

	add_menu_page("Woo Product Carousel", "Woo Carousel", "administrator", "wpc-page-setting", "wpc_product_plugin_pages", '

dashicons-images-alt2' ,36);

	add_submenu_page("wpc-page-setting", "About Us", "About Us", "administrator", "about-us", "wpc_product_plugin_pages");

}



//menu pages

add_action("admin_menu", "wpc_product_plugin_menu");

function wpc_product_plugin_pages() {



   $itm = WPC_PAGE_DIR.$_GET["page"].'.php';

   include($itm);

}



//Include css

function wpc_css_add_init() {

    wp_enqueue_style("wpc_css_and_js", WPC_INCLUDE_URL."front-style.css", false, "1.0", "all"); 

	wp_enqueue_script('wpc_css_and_js');

}

add_action( 'wp_enqueue_scripts', 'wpc_css_add_init' );







//add admin css

function wpc_admin_css() {

  wp_register_style('admin_css', plugins_url('includes/admin-style.css',__FILE__ ));

  wp_enqueue_style('admin_css');

}



add_action( 'admin_init','wpc_admin_css');





//slider settings and script

function wpc_slider_trigger(){

//getting all settings

$items=get_option('wpc_munber_of_images');

$controls= get_option('wpc_controls');

$pagination= get_option('wpc_pagination');

$slide_speed= get_option('wpc_slide_speed');

$navigation_text_next= get_option('wpc_navigation_text_next');

$navigation_text_prev= get_option('wpc_navigation_text_prev');



//if setting is naull then initial setting

if($items == ''){ $items= 5;}

if($controls == ''){ $controls= 'true';}

if($pagination == ''){ $pagination= 'true';}

if($slide_speed == ''){ $slide_speed= 1000;}

if($navigation_text_next == ''){ $navigation_text_next= '>';}

if($navigation_text_prev == ''){ $navigation_text_prev= '<';}



//include carousel css and js

wp_enqueue_style("wpc_caro_css_and_js", WPC_INCLUDE_URL."owl.carousel.css", false, "1.0", "all"); 

wp_register_script( 'wpc_caro_css_and_js', WPC_INCLUDE_URL."owl.carousel.min.js" );

wp_enqueue_script('wpc_caro_css_and_js');

?>



<script type="text/javascript">

jQuery(document).ready(function(){

  jQuery('.wpc_latest_product_slider').owlCarousel({

 

      autoPlay: false, 

      items : <?php echo $items; ?>,

      itemsDesktopSmall : [1350,4],

      itemsTablet : [768,3],

      itemsMobile : [479,1],

      paginationSpeed : 800,

      stopOnHover : true,

      navigation : <?php echo $controls; ?>,

      pagination : <?php echo $pagination; ?>,

	  slideSpeed : <?php echo $slide_speed;?>,

	  navigationText : ["<?php echo $navigation_text_prev;?>","<?php echo $navigation_text_next;?>"],

 

  });

});





jQuery(document).ready(function(){

  jQuery('.wpc_featured_product_slider').owlCarousel({

 

      autoPlay: false, 

      items : <?php echo $items; ?>,

      itemsDesktopSmall : [979,4],

      itemsTablet : [768,3],

      itemsMobile : [479,1],

      paginationSpeed : 800,

      stopOnHover : true,

      navigation : <?php echo $controls; ?>,

      pagination : <?php echo $pagination; ?>,

	  slideSpeed : <?php echo $slide_speed;?>,

	  navigationText : ["<?php echo $navigation_text_prev;?>","<?php echo $navigation_text_next;?>"],

 

  });

});

</script>



<?php

}

add_action('wp_footer','wpc_slider_trigger');



// Add Shortcode function for  latest product carousel

function wpc_latest_product_shortcode( $atts ) {

	// Attributes

	extract( shortcode_atts(

		array(

			'posts' => "-1",

			'order' => '',

			'orderby' => '',

			'title' => 'yes',

		), $atts )

	);

	



	$args = array(

				'post_type' => 'product',

		   'posts_per_page' => $posts

				);

	

	$return_string = '<div id="wpc_latest_product_slider" class="wpc_latest_product_slider">';

	

	$thePosts=query_posts($args);

		if (have_posts()) :

			while (have_posts()) : the_post();

				$post_id = get_the_ID();

				$product_id = get_post_thumbnail_id();

				$product_url = wp_get_attachment_image_src($product_id,'full',true);

				$product_mata = get_post_meta($product_id,'_wp_attachment_image_alt',true);

				// Client Link

				$product_link = get_permalink();

				

				$return_string .= '<div class="product_item">';

				if($product_link) : 

				$return_string .= '<a href="'.$product_link.'">'; // client url

				endif;

				$return_string .= '<img  src="'. $product_url[0] .'" alt="'. $product_mata .'" />';

				if($product_link) :

				$return_string .= '</a>'; // client url end

				endif;

				

				$return_string .='<h3 class="pro_title">';

				if (strlen(get_the_title()) > 20) {

					$return_string .= substr(get_the_title(), 0, 20) . '...';

				}else{

					$return_string .= get_the_title();

				}

				$return_string .='</h3>';

				

				$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>';

				$return_string .= '</div>';

			endwhile;

		endif;

	$return_string .= '</div>';



	wp_reset_query();

	$prefix_string = '<div class="heading-wooCommerce-product-carousel"><h3>Dernier produits</h3></div>';

	if(empty($thePosts)){

	    $return_string= '<div class="no-data"><strong>Aucun produit.</strong></div>';

	}

	return $prefix_string.$return_string;

}

add_shortcode( 'latest-product-carousel', 'wpc_latest_product_shortcode' ); // add shortcode for latest product carousel







// Add Shortcode function for featured carousel 

function wpc_featured_shortcode( $atts ) {

	// Attributes

	extract( shortcode_atts(

		array(

			'posts' => "-1",

			'order' => '',

			'orderby' => '',

			'title' => 'yes',

		), $atts )

	);

	

	

	$args = array(

				'post_type' => 'product',

				 'meta_key' => '_featured',

			   'meta_value' => 'yes', 

		   'posts_per_page' => $posts

				);

	

	

	$return_string = '<div id="wpc_featured_product_slider" class="wpc_featured_product_slider">';

	$thePosts= query_posts($args);

		if (have_posts()) :

			while (have_posts()) : the_post();

				$post_id = get_the_ID();

				$product_id = get_post_thumbnail_id();

				$product_url = wp_get_attachment_image_src($product_id,'full',true);

				$product_mata = get_post_meta($product_id,'_wp_attachment_image_alt',true);

				// Client Link

				$product_link = get_permalink();

				

				$return_string .= '<div class="product_item">';

				if($product_link) : 

				$return_string .= '<a href="'.$product_link.'">'; // client url

				endif;

				$return_string .= '<img  src="'. $product_url[0] .'" alt="'. $product_mata .'" />';

				if($product_link) :

				$return_string .= '</a>'; // client url end

				endif;

				

				$return_string .='<h3 class="pro_title">';

				if (strlen(get_the_title()) > 20) {

					$return_string .= substr(get_the_title(), 0, 20) . '...';

				}else{

					$return_string .= get_the_title();

				}

				$return_string .='</h3>';

				

				$return_string .= '<div class="price_area_fix">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>';

				$return_string .= '</div>';

			endwhile;

		endif;

	$return_string .= '</div>';



	wp_reset_query();

	$prefix_string = '<div class="heading-wooCommerce-product-carousel"><h3>Produits en avant</h3></div>';

	if(empty($thePosts)){

	    $return_string= '<div class="no-data"><strong>Pas encore de produit.</strong></div>';

	}

	return $prefix_string.$return_string;

}

add_shortcode( 'featured-product-carousel', 'wpc_featured_shortcode' ); // add shortcode for featured product carousel

?>