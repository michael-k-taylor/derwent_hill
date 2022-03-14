<?php

if ( ! function_exists( 'xtrail_select_portfolio_category_additional_fields' ) ) {
	function xtrail_select_portfolio_category_additional_fields() {
		
		$fields = xtrail_select_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		xtrail_select_add_taxonomy_field(
			array(
				'name'   => 'qodef_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'xtrail-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'xtrail_select_action_custom_taxonomy_fields', 'xtrail_select_portfolio_category_additional_fields' );
}