<?php

if ( ! function_exists( 'xtrail_select_map_content_bottom_meta' ) ) {
	function xtrail_select_map_content_bottom_meta() {
		
		$content_bottom_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'xtrail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'xtrail' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'xtrail' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'xtrail' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = xtrail_select_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'qodef_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'xtrail' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'xtrail' ),
				'options'       => xtrail_select_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'xtrail' ),
				'options'       => xtrail_select_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'qodef_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'xtrail' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'xtrail' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_content_bottom_meta', 71 );
}