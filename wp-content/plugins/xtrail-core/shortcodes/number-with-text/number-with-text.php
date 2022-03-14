<?php
namespace XtrailCore\CPT\Shortcodes\NumberWithText;

use XtrailCore\Lib;

class NumberWithText implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'qodef_number_with_text';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Number With Text', 'xtrail-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by XTRAIL', 'xtrail-core' ),
					'icon'                      => 'icon-wpb-image-with-text extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'xtrail-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number',
							'heading'    => esc_html__( 'Number', 'xtrail-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'xtrail-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_bg_color',
							'heading'    => esc_html__( 'Title Background Color', 'xtrail-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						)
					)
				)
			);
		}
	}

	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'   => '',
			'number'	     => '',
			'title'          => '',
			'title_bg_color' => '',
		);
		$params = shortcode_atts( $args, $atts );

		$params['holder_classes']      = $this->getHolderClasses( $params );
		$params['title_styles']        = $this->getTitleStyles( $params );

		$html = xtrail_core_get_shortcode_module_template_part( 'templates/number-with-text', 'number-with-text', '', $params );

		return $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return $holderClasses;
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_bg_color'] ) ) {
			$styles = 'background-color: ' . $params['title_bg_color'];
		}

		return $styles;
	}
}