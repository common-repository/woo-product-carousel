<?php

// WooCommerce product carousel shortcode
function wpl_woo_product_carousel_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'dots'       => 'false',
		'nav'        => 'true',
		'img_border' => 'true',
		'auto_play'  => 'true',
		'items'      => '4',
		'theme'      => 'theme_one',
	), $atts, 'woo-product-carousel' ) );


	$que = new WP_Query(
		array(
			'posts_per_page' => '-1',
			'post_type'      => 'product',
			'post_status'    => 'publish'
		)
	);
	$id = uniqid();

	$outline = '';

	$outline .= '
	    <script type="text/javascript">
	            jQuery(document).ready(function() {
				jQuery("#wpl-woo-product-carousel-' . $id . '.wpl-woo-product-carousel").slick({
			        infinite: true,
			        pauseOnHover: true,
			        slidesToShow: ' . $items . ',
			        slidesToScroll: 1,
			        autoplay: ' . $auto_play . ',
			        dots: ' . $dots . ',
		            arrows: ' . $nav . ',
		            prevArrow: "<div class=\'slick-prev\'><i class=\'fa fa-angle-left\'></i></div>",
	                nextArrow: "<div class=\'slick-next\'><i class=\'fa fa-angle-right\'></i></div>",
		            responsive: [
						    {
						      breakpoint: 1000,
						      settings: {
						        slidesToShow: 3
						      }
						    },
						    {
						      breakpoint: 700,
						      settings: {
						        slidesToShow: 2
						      }
						    },
						    {
						      breakpoint: 460,
						      settings: {
						        slidesToShow: 1
						      }
						    }
						  ]
		        });

		    });
	    </script>';

	$outline .= '<div class="wpl-woo-product-carousel-section" >';
	$outline .= '<div id="wpl-woo-product-carousel-' . $id . '" class="wpl-woo-product-carousel wpl_wpc_'.$theme.'"';
	if ( $nav == 'true' ) {
		$outline .= 'style="padding-top:50px;"';
	}
	$outline .= '>';

	if ( $que->have_posts() ) {
		while ( $que->have_posts() ) : $que->the_post();
			global $product;

			$outline .= '<div class="wpl-woo-product text-center">';
			$outline .= '<a class="wpl-woo-product-image" href="' . esc_url( get_the_permalink() ) . '" ';
			if($img_border == 'true'){
				$outline .= 'style="border:1px solid #e2e2e2;"';
			}
			$outline .= '>';
			if ( has_post_thumbnail( $que->post->ID ) ) {
				$outline .= get_the_post_thumbnail( $que->post->ID, 'wpl-woo-product-carousel-image', array( 'class' => "wpl-woo-product-img" ) );
			} else {
				$outline .= '<img id="place_holder_thm" src="' . woocommerce_placeholder_img_src() . '" alt="' . esc_html__( 'Placeholder', 'woo-product-carousel' ) . '" />';
			}
			$outline .= '</a>';
			if ( class_exists( 'WooCommerce' ) && $theme == 'theme_three' ) {
				$average = $product->get_average_rating();
				if ( $average > 0 ) {
					$outline .= '<div class="star-rating" title="' . esc_html__( 'Rated', 'woo-product-carousel' ) . ' ' . $average . '' . esc_html__( ' out of 5', 'woo-product-carousel' ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . esc_html__( 'out of 5', 'woo-product-carousel' ) . '</span></div>';
				}
			}

			$outline .= '<div class="wpl-woo-product-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';

			if ( class_exists( 'WooCommerce' ) && $theme == 'theme_one' ) {
				$average = $product->get_average_rating();
				if ( $average > 0 ) {
					$outline .= '<div class="star-rating" title="' . esc_html__( 'Rated', 'woo-product-carousel' ) . ' ' . $average . '' . esc_html__( ' out of 5', 'woo-product-carousel' ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . esc_html__( 'out of 5', 'woo-product-carousel' ) . '</span></div>';
				}
			}

			if ( class_exists( 'WooCommerce' ) && $price_html = $product->get_price_html() ) {
				$outline .= '<div class="wpl-woo-product-price">' . $price_html . '</div>';
			};

			$outline .= '<div class="wpl-woo-cart-button">' . do_shortcode( '[add_to_cart id="' . get_the_ID() . '"]' ) . '</div>';
			$outline .= '</div>';

		endwhile;
	} else {
		$outline .= '<h2 class="wpl-not-found-any-product">' . esc_html__( 'Not found any product', 'woo-product-carousel' ) . '</h2>';
	}
	$outline .= '</div>';
	$outline .= '</div>';


	wp_reset_query();

	return $outline;

}

add_shortcode( 'woo-product-carousel', 'wpl_woo_product_carousel_shortcode' );