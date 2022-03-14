<?php

if ( class_exists( 'XtrailCoreClassWidget' ) ) {
	class XtrailSelectClassSideAreaOpener extends XtrailCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_side_area_opener',
				esc_html__( 'Xtrail Side Area Opener', 'xtrail' ),
				array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'xtrail' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__( 'Side Area Opener Color', 'xtrail' ),
					'description' => esc_html__( 'Define color for side area opener', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_background_color',
					'title'       => esc_html__( 'Side Area Opener Background Color', 'xtrail' ),
					'description' => esc_html__( 'Define color for side area opener', 'xtrail' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'icon_background_transparency',
					'title'       => esc_html__( 'Side Area Opener Background Transparency (0-1)', 'xtrail' ),
					'description' => esc_html__( 'Define transparency for side area opener', 'xtrail' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__( 'Side Area Opener Hover Color', 'xtrail' ),
					'description' => esc_html__( 'Define hover color for side area opener', 'xtrail' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__( 'Side Area Opener Margin', 'xtrail' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'xtrail' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Side Area Opener Title', 'xtrail' )
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$classes = array(
				'qodef-side-menu-button-opener',
				'qodef-icon-has-hover'
			);
			
			$classes[] = xtrail_select_get_icon_sources_class( 'side_area', 'qodef-side-menu-button-opener' );
			$classes_icon = 'qodef-icon-has-hover';

			$styles = array();
			$styles_icon = array();
			if ( ! empty( $instance['icon_color'] ) ) {
				$styles_icon[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( ! empty( $instance['widget_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['widget_margin'];
			}

			if ( ! empty( $instance['icon_background_color'] ) ) {

				$background_transparency = 1;
				if ( $instance['icon_background_transparency'] != '' ) {
					$background_transparency = $instance['icon_background_transparency'];
				}

				$background_color = xtrail_select_rgba_color( $instance['icon_background_color'], $background_transparency );

				$styles[] = 'background-color: ' . $background_color;
			}
			?>
			<a <?php xtrail_select_class_attribute( $classes ); ?>  href="javascript:void(0)" <?php xtrail_select_inline_style( $styles ); ?>>
                <div class="qodef-side-menu-icon-holder">
                <?php if ( ! empty( $instance['widget_title'] ) ) { ?>
					<h6 class="qodef-side-menu-title" <?php xtrail_select_inline_style( $styles_icon ); ?>><?php echo esc_html( $instance['widget_title'] ); ?></h6>
				<?php } ?>

                    <span class="qodef-side-menu-icon <?php echo esc_attr($classes_icon) ?>" <?php echo xtrail_select_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> <?php xtrail_select_inline_style( $styles_icon ); ?>>
                        <?php echo xtrail_select_get_icon_sources_html( 'side_area' ); ?>
                    </span>
                </div>
			</a>
		<?php }
	}
}