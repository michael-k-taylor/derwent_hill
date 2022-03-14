<?php

if ( ! function_exists( 'xtrail_select_logo_meta_box_map' ) ) {
	function xtrail_select_logo_meta_box_map() {
		
		$logo_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => apply_filters( 'xtrail_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'xtrail' ),
				'name'  => 'logo_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'xtrail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'xtrail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'xtrail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'xtrail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'xtrail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'xtrail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'xtrail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'xtrail' ),
				'parent'      => $logo_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'xtrail' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'xtrail' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_logo_meta_box_map', 47 );
}