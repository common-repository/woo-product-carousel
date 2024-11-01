<?php
/*
Plugin Name: WooCommerce Product Carousel
Description: WooCommerce Product Carousel is a product carousel WordPress Plugin.
Plugin URI: https://wplimb.com/plugins/woocommerce-product-carousel-pro/
Author: WPLimb
Author URI: https://wplimb.com
Version: 1.3
*/


/* Define */
define( 'WPL_WPC_URL', plugins_url('/') . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'WPL_WPC_DIR', plugin_dir_path( __FILE__ ) );


/* Including files */
require_once( "inc/scripts.php" );
require_once( "inc/shortcodes.php" );

// Post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'wpl-woo-product-carousel-image', 330, 400, true );

/* Plugin Action Links */
function wpl_woo_product_carousel_action_links( $links ) {
	$links[] = '<a target="_blank" href="https://wplimb.com/plugins/woocommerce-product-carousel-pro/" style="color: red; font-weight: 600;">Go
Pro!</a>';

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpl_woo_product_carousel_action_links' );


// Redirect after active
function wpl_woo_product_carousel_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}
add_action( 'activated_plugin', 'wpl_woo_product_carousel_active_redirect',  10, 2);


// admin menu
function wpl_woo_product_carousel_options_framwrork() {
	add_options_page( 'WooCommerce Product Carousel PRO Info', '', 'manage_options', 'wpl-wpcp-info', 'wpl_wpcp_options_framwrork' );
}
add_action( 'admin_menu', 'wpl_woo_product_carousel_options_framwrork' );


if ( is_admin() ) : // Load only if we are viewing an admin page

	function wpl_wpcp_register_settings() {
		// Register settings and call sanitation functions
		register_setting( 'wpl_wpc_p_options', 'wpl_wpcp_options', 'wpl_wpcp_validate_options' );
	}
	add_action( 'admin_init', 'wpl_wpcp_register_settings' );


// Function to generate options page
	function wpl_wpcp_options_framwrork() {

		if ( ! isset( $_REQUEST['updated'] ) ) {
			$_REQUEST['updated'] = false;
		} // This checks whether the form has just been submitted. ?>


		<div class="wrap wpl-woo-product-carousel-pro-info">
            <div class="wpl-col-lg-1 wpl-header-text">
                <h1>Welcome To WooCommerce Product Carousel</h1> <a href="https://wplimb.com/plugins/woocommerce-product-carousel-pro/" target="_blank" class="wpl-upgrade-button">Upgrade Pro!</a>
            </div>


            <div class="wpl-all-features">
                <div class="wpl-product-features">
                    <div class="wpl-col-lg-1">
                        <h3>Thank you for installing WooCommerce Product Carousel!</h3>
                    </div>


                    <div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-wpc-free-version">
                        <h2 class="text-center">Free Version Features</h2>
                        <ul>
                            <li><span class="dashicons dashicons-yes"></span>100% Responsive</li>
                            <li><span class="dashicons dashicons-yes"></span>3+ Different Theme Styles</li>
                            <li><span class="dashicons dashicons-yes"></span>Lightweight, Fast &amp; Powerful</li>
                            <li><span class="dashicons dashicons-yes"></span>Latest/Recent Product Carousel</li>
                            <li><span class="dashicons dashicons-yes"></span>Infinite loop for products</li>
                            <li><span class="dashicons dashicons-yes"></span>Navigation arrows, dots</li>
                            <li><span class="dashicons dashicons-yes"></span>Show/hide nav arrows, dots</li>
                            <li><span class="dashicons dashicons-yes"></span>Product image border</li>
                            <li><span class="dashicons dashicons-yes"></span>Show/hide product image border</li>
                            <li><span class="dashicons dashicons-yes"></span>AutoPlay on/off</li>
                            <li><span class="dashicons dashicons-yes"></span>Set number of display products in carousel</li>
                            <li><span class="dashicons dashicons-yes"></span>Unlimited product carousel in anywhere</li>
                            <li><span class="dashicons dashicons-yes"></span>Touch and Swipe enabled</li>
                            <li><span class="dashicons dashicons-yes"></span>Easy to use &amp; developer friendly</li>
                            <li><span class="dashicons dashicons-yes"></span>Work with any WordPress Themes</li>
                            <li><span class="dashicons dashicons-yes"></span>Translation Ready</li>
                            <li><span class="dashicons dashicons-yes"></span>SEO friendly</li>
                            <li><span class="dashicons dashicons-yes"></span>Support for all browsers</li>
                            <li><span class="dashicons dashicons-yes"></span>Free Basic Support</li>
                        </ul>
                    </div>

                    <div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-wpc-pro-version">
                        <h2 class="text-center">PRO Version Features</h2>
                        <ul>
                            <li><span class="dashicons dashicons-yes"></span>30+ Pre-defined Theme Styles</li>
                            <li><span class="dashicons dashicons-yes"></span>Advanced Shortcode Generator</li>
                            <li><span class="dashicons dashicons-yes"></span>Featured, on sale, latest, best selling</li>
                            <li><span class="dashicons dashicons-yes"></span>Top rated, specific products ID or SKU</li>
                            <li><span class="dashicons dashicons-yes"></span>Display the specific categories &amp; tags</li>
                            <li><span class="dashicons dashicons-yes"></span>Automatically select categories &amp; tags</li>
                            <li><span class="dashicons dashicons-yes"></span>Display in Carousel, Slider &amp; Filter</li>
                            <li><span class="dashicons dashicons-yes"></span>Product carousel from selected products</li>
                            <li><span class="dashicons dashicons-yes"></span>Show the standard product contents</li>
                            <li><span class="dashicons dashicons-yes"></span>Show/hide Title, price, cat, add to cart etc.</li>
                            <li><span class="dashicons dashicons-yes"></span>Change color with picker for all elements</li>
                            <li><span class="dashicons dashicons-yes"></span>Unique settings for each slider</li>
                            <li><span class="dashicons dashicons-yes"></span>Set number product per slide</li>
                            <li><span class="dashicons dashicons-yes"></span>8+ different navigation position</li>
                            <li><span class="dashicons dashicons-yes"></span>Product navigation smooth dots</li> 
                            <li><span class="dashicons dashicons-yes"></span>Set no. of products in mobile, tab &amp; desktop</li>
                            <li><span class="dashicons dashicons-yes"></span>Set custom product image width &amp; height</li>
                            <li><span class="dashicons dashicons-yes"></span>Product image re-size option</li>
                            <li><span class="dashicons dashicons-yes"></span>Create Unlimited Carousels or Sliders</li>
                            
                        </ul>
                    </div>

                    <div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-wpc-pro-version">
                        <h2 class="text-center">PRO Version Features</h2>
                        <ul>
                            <li><span class="dashicons dashicons-yes"></span>Unlimited colors with the color picker</li>
                            <li><span class="dashicons dashicons-yes"></span>Product image hover effects (Mouse overlay)</li>
                            <li><span class="dashicons dashicons-yes"></span>Product QuickView and Wishlist</li>
                            <li><span class="dashicons dashicons-yes"></span>AutoPlay on/off</li>
                            <li><span class="dashicons dashicons-yes"></span>AutoPlay speed control</li>
                            <li><span class="dashicons dashicons-yes"></span>Slide speed control</li>
                            <li><span class="dashicons dashicons-yes"></span>Stop on hover option</li>
                            <li><span class="dashicons dashicons-yes"></span>Product image border &amp; hover color</li>
                            <li><span class="dashicons dashicons-yes"></span>Product order &amp; order by</li>
                            <li><span class="dashicons dashicons-yes"></span>Endless loop for products in the slider</li>
                            <li><span class="dashicons dashicons-yes"></span>Whole Product border &amp; hover color</li>
                            <li><span class="dashicons dashicons-yes"></span>Show/hide product image border</li>
                            <li><span class="dashicons dashicons-yes"></span>YITH WooCommerce QuickView &amp; Wishlist</li>
                            <li><span class="dashicons dashicons-yes"></span>Translation Ready &amp; RTL supported</li>
                            <li><span class="dashicons dashicons-yes"></span>24/7 Dedicated Support</li>
                            <li><span class="dashicons dashicons-yes"></span>Free Lifetime updates</li>
                            <li><span class="dashicons dashicons-yes"></span>100% money back guarantee</li>
                            <li><span class="dashicons dashicons-yes"></span>All features of the free version</li>
                            <li><span class="dashicons dashicons-yes"></span>And much more amazing options.</li>
                        </ul>
                    </div>
                </div>

                <div class="wpl-col-lg-1 text-center wpl-footer-info">
                    <h1>#1 Responsive WooCommerce Product Carousel for WordPress</h1>
                    <h4>(7 days moneyback gurantee, Lifetime free updates & 24/7 customer support)</h4>
                    <a href="https://wplimb.com/plugins/woocommerce-product-carousel-pro/" target="_blank" class="wpl-upgrade-button">Buy PRO only for $39</a>
                </div>

            </div>
		</div>

		<?php
	}


endif;  // EndIf is_admin()


register_activation_hook( __FILE__, 'wpl_wpcp_activate' );
add_action( 'admin_init', 'wpl_wpcp_redirect' );

function wpl_wpcp_activate() {
	add_option( 'wpl_wpcp_activation_redirect', true );
}

function wpl_wpcp_redirect() {
	if ( get_option( 'wpl_wpcp_activation_redirect', false ) ) {
		delete_option( 'wpl_wpcp_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=wpl-wpcp-info" );
		}
	}
}