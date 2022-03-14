<?php

if ( ! function_exists( 'xtrail_select_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function xtrail_select_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'xtrail_select_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'xtrail_select_header_menu_area_meta_options_map' ) ) {
	function xtrail_select_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = xtrail_select_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = xtrail_select_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'xtrail' )
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'xtrail' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'xtrail' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = xtrail_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'qodef_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'xtrail' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'xtrail' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'xtrail' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'xtrail' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'xtrail' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'xtrail' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'xtrail' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'xtrail' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = xtrail_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'qodef_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'xtrail' ),
				'description' => esc_html__( 'Set border color for grid area', 'xtrail' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'xtrail' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'xtrail' ),
				'parent'      => $menu_area_container
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'xtrail' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'xtrail' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'xtrail' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'xtrail' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'xtrail' ),
				'description'   => esc_html__( 'Set border on menu area', 'xtrail' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => xtrail_select_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = xtrail_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'qodef_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'xtrail' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'xtrail' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);

		xtrail_select_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'qodef_menu_area_height_meta',
				'label'       => esc_html__( 'Height', 'xtrail' ),
				'description' => esc_html__( 'Enter header height', 'xtrail' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px', 'xtrail' )
				)
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'qodef_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'xtrail' ),
				'description'   => esc_html__( 'Enter padding for menu area. Use format: top right bottom left (e.g. 10px 5px 10px 5px)', 'xtrail' ),
				'parent'      => $menu_area_container
			)
		);
		
		do_action( 'xtrail_select_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'xtrail_select_action_header_menu_area_meta_boxes_map', 'xtrail_select_header_menu_area_meta_options_map', 10, 1 );
}