<?php

if ( class_exists( 'XtrailCoreClassWidget' ) ) {
	class XtrailSelectClassButtonWidget extends XtrailCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_button_widget',
				esc_html__( 'Xtrail Button Widget', 'xtrail' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'xtrail' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'xtrail' ),
					'options' => array(
						'solid'   => esc_html__( 'Solid', 'xtrail' ),
						'outline' => esc_html__( 'Outline', 'xtrail' ),
						'simple'  => esc_html__( 'Simple', 'xtrail' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'xtrail' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'xtrail' ),
						'medium' => esc_html__( 'Medium', 'xtrail' ),
						'large'  => esc_html__( 'Large', 'xtrail' ),
						'huge'   => esc_html__( 'Huge', 'xtrail' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'xtrail' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'xtrail' ),
					'default' => esc_html__( 'Button Text', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'xtrail' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'xtrail' ),
					'options' => xtrail_select_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'xtrail' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'xtrail' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'xtrail' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'xtrail' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'xtrail' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'xtrail' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'xtrail' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'xtrail' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$params = '';
			
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );
			
			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}
			
			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
			
			echo '<div class="widget qodef-button-widget">';
			echo do_shortcode( "[qodef_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}