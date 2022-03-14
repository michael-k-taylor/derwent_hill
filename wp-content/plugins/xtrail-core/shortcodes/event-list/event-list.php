<?php
namespace XtrailCore\CPT\Shortcodes\EventList;

use XtrailCore\Lib;

class EventList implements Lib\ShortcodeInterface {

	private $base;

	public function __construct() {
		$this->base = 'qodef_event_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Event category filter
		add_filter( 'vc_autocomplete_qodef_event_list_category_callback', array( &$this, 'eventListCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Event category render
		add_filter( 'vc_autocomplete_qodef_event_list_category_render', array( &$this, 'eventListCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Event selected projects filter
		add_filter( 'vc_autocomplete_qodef_event_list_selected_projects_callback', array( &$this, 'eventListIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Event selected projects render
		add_filter( 'vc_autocomplete_qodef_event_list_selected_projects_render', array( &$this, 'eventListIdAutocompleteRender', ), 10, 1 ); // Render exact event list. Must return an array (label,value)
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Event List', 'xtrail-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by XTRAIL', 'xtrail-core' ),
					'icon'                      => 'icon-wpb-event-list extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'xtrail-core' ),
							'value'       => array(
								esc_html__( 'Standard', 'xtrail-core' )  => '',
								esc_html__( 'Chequered', 'xtrail-core' ) => 'chequered'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'xtrail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'xtrail-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Events Per Page', 'xtrail-core' ),
							'description' => esc_html__( 'Set number of items for your event list. Enter -1 to show all.', 'xtrail-core' ),
							'value'       => '-1'
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'skin',
							'heading'     => esc_html__( 'Skin', 'xtrail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'xtrail-core' ) => '',
								esc_html__( 'Light', 'xtrail-core' )     => 'light'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'xtrail-core' ),
							'value'       => array(
								esc_html__( 'Default', 'xtrail-core' ) => '',
								esc_html__( 'One', 'xtrail-core' )     => '1',
								esc_html__( 'Two', 'xtrail-core' )     => '2',
								esc_html__( 'Three', 'xtrail-core' )   => '3',
								esc_html__( 'Four', 'xtrail-core' )    => '4',
								esc_html__( 'Five', 'xtrail-core' )    => '5'
							),
							'description' => esc_html__( 'Default value is Five', 'xtrail-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( '' ) ),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'One-Category Event List', 'xtrail-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'xtrail-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'selected_projects',
							'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'xtrail-core' ),
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'xtrail-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_category',
							'heading'    => esc_html__( 'Enable Category', 'xtrail-core' ),
							'value'      => array_flip( xtrail_select_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Content Layout', 'xtrail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_excerpt',
							'heading'     => esc_html__( 'Enable Excerpt', 'xtrail-core' ),
							'value'       => array_flip( xtrail_select_get_yes_no_select_array( false ) ),
							'group'       => esc_html__( 'Content Layout', 'xtrail-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'chequered' ) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'xtrail-core' ),
							'description' => esc_html__( 'Number of characters', 'xtrail-core' ),
							'dependency'  => array( 'element' => 'enable_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Content Layout', 'xtrail-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'xtrail-core' ),
							'value'       => array_flip( xtrail_select_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'xtrail-core' ),
							'value'       => array_flip( xtrail_select_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'xtrail-core' ),
							'value'      => array_flip( xtrail_select_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Content Layout', 'xtrail-core' )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args = array(
			'type'                     => '',
			'custom_class'             => '',
			'number_of_items'          => '-1',
			'number_of_columns'        => '5',
			'skin'                     => '',
			'category'                 => '',
			'selected_projects'        => '',
			'enable_category'          => 'yes',
			'enable_excerpt'           => 'yes',
			'excerpt_length'           => '20',
			'orderby'                  => 'date',
			'order'                    => 'ASC',
			'title_tag'                => 'h4'
		);

		$params = shortcode_atts( $args, $atts );

		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );

		$params['query_results'] = $query_results;

		$params['holder_classes'] = $this->getHolderClasses( $params );

		$html = xtrail_core_get_shortcode_module_template_part( 'templates/event-list-holder', 'event-list', '', $params );

		return $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['type'] ) ? 'qodef-el-' . $params['type'] : 'qodef-el-standard';
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['skin'] ) ? 'qodef-event-skin-'. esc_attr( $params['skin'] ) : '';

		if ($params['type'] == 'chequered') {
			$holderClasses[] = 'qodef-event-list-two-columns';
		} else {
			$number_of_columns = $params['number_of_columns'];
			switch ($number_of_columns):
				case '1':
					$holderClasses[] = 'qodef-event-list-one-column';
					break;
				case '2':
					$holderClasses[] = 'qodef-event-list-two-columns';
					break;
				case '3':
					$holderClasses[] = 'qodef-event-list-three-columns';
					break;
				case '4':
					$holderClasses[] = 'qodef-event-list-four-columns';
					break;
				case '5':
					$holderClasses[] = 'qodef-event-list-five-columns';
					break;
				default:
					$holderClasses[] = 'qodef-event-list-five-columns';
					break;
			endswitch;
		}

		return implode( ' ', $holderClasses );
	}

	public function getQueryArray( $params ) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'events',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['orderby'],
			'order'          => $params['order']
		);

		if ( ! empty( $params['category'] ) ) {
			$query_array['events_category'] = $params['category'];
		}

		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}

		return $query_array;
	}


	/**
	 * Filter event categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function eventListCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS event_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'events_category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['event_category_title'] ) > 0 ) ? esc_html__( 'Category', 'xtrail-core' ) . ': ' . $value['event_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find event category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function eventListCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get event category
			$event_category = get_term_by( 'slug', $query, 'events_category' );
			if ( is_object( $event_category ) ) {

				$event_category_slug  = $event_category->slug;
				$event_category_title = $event_category->name;

				$event_category_title_display = '';
				if ( ! empty( $event_category_title ) ) {
					$event_category_title_display = esc_html__( 'Category', 'xtrail-core' ) . ': ' . $event_category_title;
				}

				$data          = array();
				$data['value'] = $event_category_slug;
				$data['label'] = $event_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter events by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function eventListIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$event_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'events' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $event_id > 0 ? $event_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'xtrail-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'xtrail', 'xtrail-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;
	}

	/**
	 * Find event by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function eventListIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get event
			$event = get_post( (int) $query );
			if ( ! is_wp_error( $event ) ) {

				$event_id    = $event->ID;
				$event_title = $event->post_title;

				$event_title_display = '';
				if ( ! empty( $event_title ) ) {
					$event_title_display = ' - ' . esc_html__( 'Title', 'xtrail-core' ) . ': ' . $event_title;
				}

				$event_id_display = esc_html__( 'Id', 'xtrail-core' ) . ': ' . $event_id;

				$data          = array();
				$data['value'] = $event_id;
				$data['label'] = $event_id_display . $event_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}