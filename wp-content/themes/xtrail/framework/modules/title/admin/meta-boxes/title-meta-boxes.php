<?php

if ( ! function_exists( 'xtrail_select_get_title_types_meta_boxes' ) ) {
	function xtrail_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'xtrail_select_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'xtrail' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'xtrail_select_map_title_meta' ) ) {
	function xtrail_select_map_title_meta() {
		$title_type_meta_boxes = xtrail_select_get_title_types_meta_boxes();
		
		$title_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'xtrail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'xtrail' ),
				'name'  => 'title_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'xtrail' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'xtrail' ),
				'parent'        => $title_meta_box,
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = xtrail_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'xtrail' ),
						'description'   => esc_html__( 'Choose title type', 'xtrail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'xtrail' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'xtrail' ),
						'options'       => xtrail_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'xtrail' ),
						'description' => esc_html__( 'Set a height for Title Area', 'xtrail' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);

                xtrail_select_create_meta_box_field(
                    array(
                        'name'        => 'qodef_title_area_height__mobile_meta',
                        'type'        => 'text',
                        'label'       => esc_html__( 'Height on Mobile', 'xtrail' ),
                        'description' => esc_html__( 'Set a height for Title Area on Mobile', 'xtrail' ),
                        'parent'      => $show_title_area_meta_container,
                        'args'        => array(
                            'col_width' => 2,
                            'suffix'    => 'px'
                        )
                    )
                );
				
				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'xtrail' ),
						'description' => esc_html__( 'Choose a background color for title area', 'xtrail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'xtrail' ),
						'description' => esc_html__( 'Choose an Image for title area', 'xtrail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'xtrail' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'xtrail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'xtrail' ),
							'hide'                => esc_html__( 'Hide Image', 'xtrail' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'xtrail' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'xtrail' ),
							'mobile-cover'        => esc_html__( 'Enable Cover Image on Mobile', 'xtrail' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'xtrail' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'xtrail' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'xtrail' )
						)
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'xtrail' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'xtrail' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'xtrail' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'xtrail' ),
							'window-top'    => esc_html__( 'From Window Top', 'xtrail' )
						)
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'xtrail' ),
						'options'       => xtrail_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);

                xtrail_select_create_meta_box_field(
                    array(
                        'name'          => 'qodef_title_text_underline_meta',
                        'type'          => 'select',
                        'default_value' => '',
                        'label'         => esc_html__( 'Title Underline', 'xtrail' ),
                        'description'   => esc_html__( 'Enable underline below title text for standard title type', 'xtrail' ),
                        'options'       => xtrail_select_get_yes_no_select_array(),
                        'parent'        => $show_title_area_meta_container
                    )
                );
				
				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'xtrail' ),
						'description' => esc_html__( 'Choose a color for title text', 'xtrail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'xtrail' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'xtrail' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'xtrail' ),
						'options'       => xtrail_select_get_title_tag( true, array( 'p' => 'p', 'span' => 'span' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'xtrail' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'xtrail' ),
						'parent'      => $show_title_area_meta_container
					)
				);

				xtrail_select_create_meta_box_field(
					array(
						'name'        => 'qodef_mobile_subtitle_meta',
						'type'        => 'yesno',
						'label'       => esc_html__( 'Disable Subtitle on Mobile', 'xtrail' ),
						'description' => esc_html__( 'Enabling this option will disable subtitle on mobile devices.', 'xtrail' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'xtrail_select_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_title_meta', 60 );
}