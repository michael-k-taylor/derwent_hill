<?php

if ( ! function_exists( 'xtrail_select_portfolio_options_map' ) ) {
	function xtrail_select_portfolio_options_map() {
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'xtrail-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = xtrail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'xtrail-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'xtrail-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'xtrail-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'xtrail-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'xtrail-core' ),
				'parent'        => $panel_archive,
				'options'       => xtrail_select_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'xtrail-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'xtrail-core' ),
				'default_value' => 'normal',
				'options'       => xtrail_select_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'xtrail-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'xtrail-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'xtrail-core' ),
					'landscape' => esc_html__( 'Landscape', 'xtrail-core' ),
					'portrait'  => esc_html__( 'Portrait', 'xtrail-core' ),
					'square'    => esc_html__( 'Square', 'xtrail-core' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'xtrail-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'xtrail-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'xtrail-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'xtrail-core' )
				)
			)
		);
		
		$panel = xtrail_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'xtrail-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'xtrail-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'xtrail-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'xtrail-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'xtrail-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => xtrail_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'xtrail-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'xtrail-core' ),
				'default_value' => 'normal',
				'options'       => xtrail_select_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'xtrail-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'xtrail-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => xtrail_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'xtrail-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'xtrail-core' ),
				'default_value' => 'normal',
				'options'       => xtrail_select_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'xtrail-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'xtrail-core' ),
					'yes' => esc_html__( 'Yes', 'xtrail-core' ),
					'no'  => esc_html__( 'No', 'xtrail-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'xtrail-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = xtrail_select_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'xtrail-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'xtrail-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'xtrail-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'xtrail-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_portfolio_options_map', xtrail_select_set_options_map_position( 'portfolio' ) );
}