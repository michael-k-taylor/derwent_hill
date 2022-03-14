<?php

if ( ! function_exists( 'xtrail_select_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function xtrail_select_woocommerce_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'xtrail' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = xtrail_select_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'woo_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'xtrail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for main shop page', 'xtrail' ),
				'options'     => xtrail_select_get_space_between_items_array( true ),
				'parent'      => $panel_product_list
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'xtrail' ),
				'default_value' => 'qodef-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for main shop page', 'xtrail' ),
				'options'       => array(
					'qodef-woocommerce-columns-3' => esc_html__( '3 Columns', 'xtrail' ),
					'qodef-woocommerce-columns-4' => esc_html__( '4 Columns', 'xtrail' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'xtrail' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'xtrail' ),
				'default_value' => 'normal',
				'options'       => xtrail_select_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'xtrail' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'xtrail' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'xtrail' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'xtrail' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'qodef_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'xtrail' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'xtrail' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'xtrail' ),
				'default_value' => 'h4',
				'options'       => xtrail_select_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'woo_enable_percent_sign_value',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Percent Sign', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show percent value mark instead of sale label on products', 'xtrail' ),
				'parent'        => $panel_product_list
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = xtrail_select_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'xtrail' ),
				'parent'        => $panel_single_product,
				'options'       => xtrail_select_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_single_product_title_tag',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'xtrail' ),
				'options'       => xtrail_select_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'xtrail' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'xtrail' ),
					'3' => esc_html__( 'Three', 'xtrail' ),
					'2' => esc_html__( 'Two', 'xtrail' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'xtrail' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'xtrail' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'xtrail' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'xtrail' ),
				'parent'        => $panel_single_product,
				'options'       => xtrail_select_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'xtrail' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'xtrail' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'xtrail' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_woo_related_products_columns',
				'label'         => esc_html__( 'Related Products Columns', 'xtrail' ),
				'default_value' => 'qodef-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'xtrail' ),
				'options'       => array(
					'qodef-woocommerce-columns-3' => esc_html__( '3 Columns', 'xtrail' ),
					'qodef-woocommerce-columns-4' => esc_html__( '4 Columns', 'xtrail' )
				),
				'parent'        => $panel_single_product,
			)
		);

		do_action('xtrail_select_woocommerce_additional_options_map');
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_woocommerce_options_map', xtrail_select_set_options_map_position( 'woocommerce' ) );
}