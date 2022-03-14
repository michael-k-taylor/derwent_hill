<?php

if ( ! function_exists( 'xtrail_select_map_post_quote_meta' ) ) {
	function xtrail_select_map_post_quote_meta() {
		$quote_post_format_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'xtrail' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'xtrail' ),
				'description' => esc_html__( 'Enter Quote text', 'xtrail' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'xtrail' ),
				'description' => esc_html__( 'Enter Quote author', 'xtrail' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_post_quote_meta', 25 );
}