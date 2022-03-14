<?php

if ( ! function_exists( 'xtrail_select_disable_wpml_css' ) ) {
	function xtrail_select_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'xtrail_select_disable_wpml_css' );
}