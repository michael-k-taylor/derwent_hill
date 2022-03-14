<?php

if ( ! function_exists( 'xtrail_select_map_footer_meta' ) ) {
	function xtrail_select_map_footer_meta() {
		
		$footer_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'xtrail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'xtrail' ),
				'name'  => 'footer_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer For This Page', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'xtrail' ),
				'options'       => xtrail_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = xtrail_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			xtrail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'xtrail' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'xtrail' ),
					'options'       => xtrail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			xtrail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'xtrail' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'xtrail' ),
					'options'       => xtrail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			xtrail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'xtrail' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'xtrail' ),
					'options'       => xtrail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_top_styles_group = xtrail_select_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'xtrail' ),
					'description' => esc_html__( 'Define style for footer top area', 'xtrail' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'qodef_show_footer_top_meta' => 'no'
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = xtrail_select_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'xtrail' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'xtrail' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'xtrail' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			xtrail_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'xtrail' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'xtrail' ),
					'options'       => xtrail_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = xtrail_select_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'xtrail' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'xtrail' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'hide' => array(
							'qodef_show_footer_bottom_meta' => 'no'
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = xtrail_select_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'xtrail' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'xtrail' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				xtrail_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'xtrail' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_footer_meta', 70 );
}