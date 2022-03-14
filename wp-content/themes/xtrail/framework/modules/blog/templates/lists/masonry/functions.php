<?php

if ( ! function_exists( 'xtrail_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function xtrail_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'xtrail' );
		
		return $templates;
	}
	
	add_filter( 'xtrail_select_filter_register_blog_templates', 'xtrail_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'xtrail_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function xtrail_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'xtrail' );
		
		return $options;
	}
	
	add_filter( 'xtrail_select_filter_blog_list_type_global_option', 'xtrail_select_set_blog_masonry_type_global_option' );
}