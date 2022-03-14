<?php

if ( ! function_exists( 'xtrail_core_map_testimonials_meta' ) ) {
	function xtrail_core_map_testimonials_meta() {
		$testimonial_meta_box = xtrail_select_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'xtrail-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'xtrail-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'xtrail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'xtrail-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'xtrail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'xtrail-core' ),
				'description' => esc_html__( 'Enter author name', 'xtrail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		xtrail_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'xtrail-core' ),
				'description' => esc_html__( 'Enter author job position', 'xtrail-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'xtrail_select_action_meta_boxes_map', 'xtrail_core_map_testimonials_meta', 95 );
}