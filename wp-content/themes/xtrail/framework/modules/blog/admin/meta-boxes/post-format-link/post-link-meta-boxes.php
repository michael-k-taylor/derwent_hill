<?php

if ( ! function_exists( 'xtrail_select_map_post_link_meta' ) ) {
	function xtrail_select_map_post_link_meta() {
		$link_post_format_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'xtrail' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'xtrail' ),
				'description' => esc_html__( 'Enter link', 'xtrail' ),
				'parent'      => $link_post_format_meta_box
			)
		);

		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_linked_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Linked Text', 'xtrail' ),
				'description' => esc_html__( 'Enter text', 'xtrail' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_post_link_meta', 24 );
}