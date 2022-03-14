<?php

if ( class_exists( 'XtrailCoreClassWidget' ) ) {
	class XtrailSelectClassSeparatorWidget extends XtrailCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_separator_widget',
				esc_html__( 'Xtrail Separator Widget', 'xtrail' ),
				array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'xtrail' ) )
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
						'normal'     => esc_html__( 'Normal', 'xtrail' ),
						'full-width' => esc_html__( 'Full Width', 'xtrail' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'position',
					'title'   => esc_html__( 'Position', 'xtrail' ),
					'options' => array(
						'center' => esc_html__( 'Center', 'xtrail' ),
						'left'   => esc_html__( 'Left', 'xtrail' ),
						'right'  => esc_html__( 'Right', 'xtrail' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'border_style',
					'title'   => esc_html__( 'Style', 'xtrail' ),
					'options' => array(
						'solid'  => esc_html__( 'Solid', 'xtrail' ),
						'dashed' => esc_html__( 'Dashed', 'xtrail' ),
						'dotted' => esc_html__( 'Dotted', 'xtrail' )
					)
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'width',
					'title' => esc_html__( 'Width (px or %)', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'thickness',
					'title' => esc_html__( 'Thickness (px)', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'top_margin',
					'title' => esc_html__( 'Top Margin (px or %)', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'bottom_margin',
					'title' => esc_html__( 'Bottom Margin (px or %)', 'xtrail' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}
			
			//prepare variables
			$params = '';
			
			//is instance empty?
			if ( is_array( $instance ) && count( $instance ) ) {
				//generate shortcode params
				foreach ( $instance as $key => $value ) {
					$params .= " $key='$value' ";
				}
			}
			
			echo '<div class="widget qodef-separator-widget">';
			echo do_shortcode( "[qodef_separator $params]" ); // XSS OK
			echo '</div>';
		}
	}
}