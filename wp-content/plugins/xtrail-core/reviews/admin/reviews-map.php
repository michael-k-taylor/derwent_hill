<?php

if ( ! function_exists( 'xtrail_core_reviews_map' ) ) {
	function xtrail_core_reviews_map() {
		
		$reviews_panel = xtrail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'xtrail-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'xtrail-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'xtrail-core' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'xtrail-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'xtrail-core' ),
			)
		);
	}
	
	add_action( 'xtrail_select_action_additional_page_options_map', 'xtrail_core_reviews_map', 75 ); //one after elements
}