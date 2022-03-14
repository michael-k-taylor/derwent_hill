<?php

if ( ! function_exists( 'xtrail_select_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function xtrail_select_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'XtrailSelectNamespace\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'xtrail_select_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function xtrail_select_init_register_header_standard_type() {
		add_filter( 'xtrail_select_filter_register_header_type_class', 'xtrail_select_register_header_standard_type' );
	}
	
	add_action( 'xtrail_select_action_before_header_function_init', 'xtrail_select_init_register_header_standard_type' );
}