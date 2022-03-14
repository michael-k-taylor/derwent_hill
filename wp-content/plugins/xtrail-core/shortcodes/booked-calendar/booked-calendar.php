<?php
namespace XtrailCore\CPT\Shortcodes\BookedCalendar;

use XtrailCore\Lib;

class BookedCalendar implements Lib\ShortcodeInterface {
    private $base;

    public function __construct() {
        $this->base = 'qodef_booked_calendar';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
            'name' => esc_html__('Booked Calendar', 'xtrail-core'),
            'base' => $this->base,
            'category' => esc_html__('by XTRAIL', 'xtrail-core'),
            'icon' => 'icon-wpb-booked-calendar extended-custom-icon',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'param_name' => 'custom_class',
                    'heading' => esc_html__('Custom CSS Class', 'xtrail-core'),
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS', 'xtrail-core')
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'calendar',
                    'heading' => esc_html__('Calendar', 'xtrail-core'),
                    'value' => array_flip(xtrail_core_get_booked_calendar_array()),
                    'save_always' => true
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'calendar_size',
                    'heading' => esc_html__('Calendar Size', 'xtrail-core'),
                    'value' => array(
                        esc_html__('Large', 'xtrail-core') => 'large',
                        esc_html__('Small', 'xtrail-core') => 'small'
                    ),
                    'save_always' => true
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'title',
                    'heading' => esc_html__('Title', 'xtrail-core'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'title_tag',
                    'heading' => esc_html__('Title Tag', 'xtrail-core'),
                    'value' => array_flip(xtrail_select_get_title_tag(true, array('p' => 'p'))),
                    'save_always' => true,
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'colorpicker',
                    'param_name' => 'title_color',
                    'heading' => esc_html__('Title Color', 'xtrail-core'),
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'dropdown',
                    'param_name' => 'title_font_weight',
                    'heading' => esc_html__('Title Font Weight', 'xtrail-core'),
                    'value' => array_flip(xtrail_select_get_font_weight_array(true)),
                    'save_always' => true,
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                ),
                array(
                    'type' => 'textfield',
                    'param_name' => 'title_bottom_margin',
                    'heading' => esc_html__('Title Bottom Margin (px)', 'xtrail-core'),
                    'dependency' => array('element' => 'title', 'not_empty' => true)
                )
            )
        ));
    }

    public function render($atts, $content = null) {
        $args = array(
            'custom_class' => '',
            'calendar' => '',
            'calendar_size' => 'large',
            'title' => '',
            'title_tag' => 'h6',
            'title_color' => '',
            'title_font_weight' => '',
            'title_bottom_margin' => ''
        );

        $params = shortcode_atts($args, $atts);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
        $params['title_styles'] = $this->getTitleStyles($params);
        $params['content'] = $content;
        $params['calendar_attrs'] = $this->getCalendarAttributes($params);

        return xtrail_core_get_shortcode_module_template_part( 'templates/booked-calendar-template', 'booked-calendar', '', $params );
    }

    private function getHolderClasses($params) {
        $classes = array();

        $classes[] = 'qodef-booked-calendar';
        $classes[] = !empty($params['custom_class']) ? esc_attr($params['custom_class']) : '';

        // @see http://php.net/manual/en/function.array-filter.php
        return implode(' ', array_filter($classes));
    }

    private function getTitleStyles($params) {
        $styles = array();

        $styles[] = !empty($params['title_color']) ? 'color: ' . $params['title_color'] : '';
        $styles[] = !empty($params['title_font_weight']) ? 'font-weight: ' . $params['title_font_weight'] : '';
        $styles[] = !empty($params['title_bottom_margin']) ? 'margin-bottom: ' . xtrail_select_filter_px($params['title_bottom_margin']) . 'px' : '';

        // @see http://php.net/manual/en/function.array-filter.php
        return implode(';', array_filter($styles));
    }

    private function getCalendarAttributes($params) {
        $attrs = array();

        $attrs[] = !empty($params['calendar']) ? 'calendar="' . esc_attr($params['calendar']) . '"' : '';
        $attrs[] = !empty($params['calendar_size']) ? 'size="' . esc_attr($params['calendar_size']) . '"' : '';

        // @see http://php.net/manual/en/function.array-filter.php
        return implode(' ', array_filter($attrs));
    }
}