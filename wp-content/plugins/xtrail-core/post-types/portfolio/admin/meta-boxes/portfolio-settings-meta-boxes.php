<?php

if ( ! function_exists( 'xtrail_core_map_portfolio_settings_meta' ) ) {
	function xtrail_core_map_portfolio_settings_meta() {
		$meta_box = xtrail_select_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'xtrail-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		xtrail_select_create_meta_box_field( array(
			'name'        => 'qodef_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'xtrail-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'xtrail-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'xtrail-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'xtrail-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'xtrail-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'xtrail-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'xtrail-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'xtrail-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'xtrail-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'xtrail-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'xtrail-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'xtrail-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'xtrail-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'xtrail-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'xtrail-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'xtrail-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => xtrail_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'xtrail-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'xtrail-core' ),
				'default_value' => '',
				'options'       => xtrail_select_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'xtrail-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'xtrail-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => xtrail_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'xtrail-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'xtrail-core' ),
				'default_value' => '',
				'options'       => xtrail_select_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'xtrail-core' ),
				'parent'        => $meta_box,
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'xtrail-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'xtrail-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'xtrail-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'xtrail-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'xtrail-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'xtrail-core' ),
				'parent'      => $meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'xtrail-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'xtrail-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'xtrail-core' ),
					'small'              => esc_html__( 'Small', 'xtrail-core' ),
					'large-width'        => esc_html__( 'Large Width', 'xtrail-core' ),
					'large-height'       => esc_html__( 'Large Height', 'xtrail-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'xtrail-core' )
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'xtrail-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'xtrail-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'xtrail-core' ),
					'large-width' => esc_html__( 'Large Width', 'xtrail-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'xtrail-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'xtrail-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_core_map_portfolio_settings_meta', 41 );
}