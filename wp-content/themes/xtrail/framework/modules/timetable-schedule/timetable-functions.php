<?php

if (!function_exists('xtrail_select_register_timetable_sidebars')) {
	/**
	 * Function that registers theme's sidebars
	 */
	function xtrail_select_register_timetable_sidebars() {
		
		register_sidebar(array(
			'name' => esc_html__('Sidebar Event', 'xtrail'),
			'id' => 'sidebar-event',
			'description' => esc_html__('Default Sidebar for Timetable pages', 'xtrail'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<div class="qodef-widget-title-holder"><h5 class="qodef-widget-title">',
			'after_title' => '</h5></div>'
		));
	}
	
	add_action('widgets_init', 'xtrail_select_register_timetable_sidebars', 1);
}

if ( ! function_exists( 'xtrail_select_get_tt_event_single_content' ) ) {
	/**
	 * Loads timetable single event page
	 */

	function xtrail_select_get_tt_event_single_content() {
		$subtitle = get_post_meta( get_the_ID(), 'timetable_subtitle', true );
		
		$params = array(
			'subtitle' => $subtitle
		);

		xtrail_select_get_module_template_part( 'templates/events-single', 'timetable-schedule', '', $params );
	}

}

if ( ! function_exists( 'xtrail_select_tt_events_single_default_sidebar' ) ) {
	/**
	 * Sets default sidebar for timetable single event event
	 *
	 * @param $sidebar
	 *
	 * @return string
	 */
	function xtrail_select_tt_events_single_default_sidebar( $sidebar ) {
		$page_id = xtrail_select_get_page_id();
		
		if ( get_post_type( $page_id ) === 'events' ) {
			$custom_sidebar_area = get_post_meta( $page_id, 'qodef_custom_sidebar_area_meta', true );
			$sidebar             = ! empty( $custom_sidebar_area ) ? $custom_sidebar_area : 'sidebar-event';
		}
		
		return $sidebar;
	}
	
	add_filter( 'xtrail_select_filter_sidebar_name', 'xtrail_select_tt_events_single_default_sidebar' );
}

if(!function_exists('xtrail_select_events_scope_meta_box_functions')) {
	function xtrail_select_events_scope_meta_box_functions($post_types) {
		$post_types[] = 'events';

		return $post_types;
	}

	add_filter('xtrail_select_filter_meta_box_post_types_save', 'xtrail_select_events_scope_meta_box_functions');
	add_filter('xtrail_select_filter_meta_box_post_types_remove', 'xtrail_select_events_scope_meta_box_functions');
	add_filter('xtrail_select_filter_set_scope_for_meta_boxes', 'xtrail_select_events_scope_meta_box_functions');
}

if ( ! function_exists( 'qodef_core_set_timetable_event_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set timetable events class name for shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function qodef_core_set_timetable_event_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-events-hours';
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-event-info-holder';
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-event-info-table-item';
		
		return $shortcodes_icon_class_array;
	}

	if ( xtrail_select_core_plugin_installed() ) {
		add_filter( 'xtrail_core_filter_add_vc_shortcodes_custom_icon_class', 'qodef_core_set_timetable_event_icon_class_name_for_vc_shortcodes' );
	}
}

if ( ! function_exists( 'xtrail_select_get_events_related_post_type' ) ) {
	/**
	 * Function for returning latest posts types
	 *
	 * @param $post_id
	 * @param array $options
	 *
	 * @return WP_Query
	 */
	function xtrail_select_get_events_related_post_type( $post_id ) {
		//Get categories
		$categories = wp_get_post_terms(get_the_ID(), 'events_category');

		$category_ids = array();
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
		}

		$hasRelatedByTag = false;

		if ( $categories && ! $hasRelatedByTag ) {
			$related_by_category = xtrail_select_get_events_related_posts( $post_id, $category_ids, 'events_category' );

			if ( ! empty( $related_by_category->post ) ) {
				return $related_by_category;
			}
		}
	}
}

if ( ! function_exists( 'xtrail_select_get_events_related_posts' ) ) {
	/**
	 * Function for related events
	 *
	 * @param $post_id - Post ID
	 * @param $term_ids - Category IDs
	 * @param $slug - term slug for WP_Query
	 * @param array $options
	 *
	 * @return WP_Query
	 */
	function xtrail_select_get_events_related_posts( $post_id, $term_ids, $taxonomy ) {
		$args = array(
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => '6',
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $term_ids,
				),
			)
		);

		$related_by_taxonomy = new WP_Query( $args );

		return $related_by_taxonomy;
	}
}