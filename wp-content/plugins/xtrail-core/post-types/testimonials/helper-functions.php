<?php

if ( ! function_exists( 'xtrail_core_testimonials_meta_box_functions' ) ) {
	function xtrail_core_testimonials_meta_box_functions( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'xtrail_select_filter_meta_box_post_types_save', 'xtrail_core_testimonials_meta_box_functions' );
	add_filter( 'xtrail_select_filter_meta_box_post_types_remove', 'xtrail_core_testimonials_meta_box_functions' );
}

if ( ! function_exists( 'xtrail_core_register_testimonials_cpt' ) ) {
	function xtrail_core_register_testimonials_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'XtrailCore\CPT\Testimonials\TestimonialsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'xtrail_core_filter_register_custom_post_types', 'xtrail_core_register_testimonials_cpt' );
}

// Load testimonials shortcodes
if ( ! function_exists( 'xtrail_core_include_testimonials_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function xtrail_core_include_testimonials_shortcodes_files() {
		foreach ( glob( XTRAIL_CORE_CPT_PATH . '/testimonials/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	add_action( 'xtrail_core_action_include_shortcodes_file', 'xtrail_core_include_testimonials_shortcodes_files' );
}