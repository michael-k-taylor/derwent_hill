<?php

if ( ! function_exists( 'xtrail_select_get_blog_list_types_options' ) ) {
	function xtrail_select_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'xtrail_select_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'xtrail_select_blog_options_map' ) ) {
	function xtrail_select_blog_options_map() {
		$blog_list_type_options = xtrail_select_get_blog_list_types_options();
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'xtrail' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = xtrail_select_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'blog_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'xtrail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for blog post lists. Default value is large', 'xtrail' ),
				'options'     => xtrail_select_get_space_between_items_array( true ),
				'parent'      => $panel_blog_lists
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'xtrail' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'xtrail' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'xtrail' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'xtrail' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => xtrail_select_get_custom_sidebars_options(),
			)
		);
		
		$xtrail_custom_sidebars = xtrail_select_get_custom_sidebars();
		if ( count( $xtrail_custom_sidebars ) > 0 ) {
			xtrail_select_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'xtrail' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'xtrail' ),
					'parent'      => $panel_blog_lists,
					'options'     => xtrail_select_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'xtrail' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'xtrail' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'xtrail' ),
					'full-width' => esc_html__( 'Full Width', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'xtrail' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'xtrail' ),
				'parent'        => $panel_blog_lists,
				'options'       => xtrail_select_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'xtrail' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'xtrail' ),
				'default_value' => 'normal',
				'options'       => xtrail_select_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'xtrail' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'xtrail' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'xtrail' ),
					'original' => esc_html__( 'Original', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'xtrail' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'xtrail' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'xtrail' ),
					'load-more'       => esc_html__( 'Load More', 'xtrail' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'xtrail' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'xtrail' )
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '65',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'xtrail' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 65', 'xtrail' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        xtrail_select_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'number_of_chars_archive',
                'default_value' => '65',
                'label'         => esc_html__( 'Number of Words in Excerpt in Archive', 'xtrail' ),
                'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). If left empty, inherits the value from default (above)', 'xtrail' ),
                'parent'        => $panel_blog_lists,
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_tags_area_blog',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'xtrail' ),
				'parent'        => $panel_blog_lists
			)
		);

		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_different_category_style',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Different Category Style on Standard List and Single Posts', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will apply different category style on standard blog list and single posts', 'xtrail' ),
				'parent'        => $panel_blog_lists
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = xtrail_select_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'        => 'blog_single_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'xtrail' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for Blog Single pages. Default value is large', 'xtrail' ),
				'options'     => xtrail_select_get_space_between_items_array( true ),
				'parent'      => $panel_blog_single
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'xtrail' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'xtrail' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => xtrail_select_get_custom_sidebars_options()
			)
		);
		
		if ( count( $xtrail_custom_sidebars ) > 0 ) {
			xtrail_select_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'xtrail' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'xtrail' ),
					'parent'      => $panel_blog_single,
					'options'     => xtrail_select_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'xtrail' ),
				'parent'        => $panel_blog_single,
				'options'       => xtrail_select_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'xtrail' ),
				'parent'        => $panel_blog_single,
				'dependency' => array(
					'hide' => array(
						'show_title_area_blog' => 'no'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'xtrail' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'xtrail' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'xtrail' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'xtrail' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'xtrail' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'xtrail' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages. Author biographic info field in Users section must contain some data', 'xtrail' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'qodef_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'xtrail' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'xtrail' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'xtrail_select_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_blog_options_map', xtrail_select_set_options_map_position( 'blog' ) );
}