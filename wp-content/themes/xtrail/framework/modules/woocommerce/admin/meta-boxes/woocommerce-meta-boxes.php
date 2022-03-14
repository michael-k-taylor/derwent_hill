<?php

if ( ! function_exists( 'xtrail_select_map_woocommerce_meta' ) ) {
	function xtrail_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'xtrail' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'xtrail' ),
				'description' => esc_html__( 'Choose image layout when it appears in Select Product List - Masonry layout shortcode', 'xtrail' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'xtrail' ),
					'small'              => esc_html__( 'Small', 'xtrail' ),
					'large-width'        => esc_html__( 'Large Width', 'xtrail' ),
					'large-height'       => esc_html__( 'Large Height', 'xtrail' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'xtrail' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'xtrail' ),
				'options'       => xtrail_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'xtrail' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_woocommerce_meta', 99 );
}