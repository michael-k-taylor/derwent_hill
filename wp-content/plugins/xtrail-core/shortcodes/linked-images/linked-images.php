<?php
namespace XtrailCore\CPT\Shortcodes\LinkedImage;

use XtrailCore\Lib;

class LinkedImages implements Lib\ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'qodef_linked_images';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'		=> esc_html__('Linked Images', 'xtrail-core'),
			'base'		=> $this->base,
			'icon'		=> 'icon-wpb-linked-image extended-custom-icon',
			'category'	=> esc_html__('by XTRAIL', 'xtrail-core'),
			'as_parent'	=> array('only' => 'qodef_linked_image'),
			'js_view'	=> 'VcColumnView',
			'params'	=> array(
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Number of Linked Images', 'xtrail-core'),
					'admin_label'	=> true,
					'param_name'	=> 'number_of_linked_images',
					'value'			=> array(
						esc_html__('3 Images', 'xtrail-core') => 'three-images',
						esc_html__('4 Images', 'xtrail-core') => 'four-images',
						esc_html__('5 Images', 'xtrail-core') => 'five-images',
					),
					'save_always'   => true,
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_linked_images' => '',
			'fullheight' 			  => 'yes'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$linked_images_class = $this->getLinkedImagesClasses($params);

		$html						= '';

		$html .= '<div class="' . $linked_images_class . '" data-full-height="yes">';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}

	/**
     * Returns array of HTML classes for Linked Images
     *
     * @param $params
     *
     * @return array
     */
    private function getLinkedImagesClasses($params) {
        $linked_images_classes = array();
		$linked_images_classes[] = 'qodef-linked-images';

		if($params['number_of_linked_images'] != ''){
			$linked_images_classes[] = 'qodef-linked-images-'.$params['number_of_linked_images'] ;
		}

        $linked_images_classes = implode(' ', $linked_images_classes);

        return $linked_images_classes;
    }
}