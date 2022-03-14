<?php

if ( ! function_exists( 'xtrail_select_centered_title_type_options_meta_boxes' ) ) {
	function xtrail_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'xtrail' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'xtrail' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'xtrail_select_action_additional_title_area_meta_boxes', 'xtrail_select_centered_title_type_options_meta_boxes', 5 );
}