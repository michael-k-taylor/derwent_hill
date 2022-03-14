<?php

if ( ! function_exists( 'xtrail_select_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function xtrail_select_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'XtrailSelectClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'xtrail_core_filter_register_widgets', 'xtrail_select_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'xtrail_select_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function xtrail_select_get_dropdown_cart_icon_class() {
		$classes = array(
			'qodef-header-cart'
		);
		
		$classes[] = xtrail_select_get_icon_sources_class( 'dropdown_cart', 'qodef-header-cart' );
		
		return implode( ' ', $classes );
	}
}