<?php

if ( ! function_exists( 'xtrail_select_map_post_gallery_meta' ) ) {
	
	function xtrail_select_map_post_gallery_meta() {
		$gallery_post_format_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'xtrail' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		xtrail_select_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'xtrail' ),
				'description' => esc_html__( 'Choose your gallery images', 'xtrail' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_select_map_post_gallery_meta', 21 );
}
