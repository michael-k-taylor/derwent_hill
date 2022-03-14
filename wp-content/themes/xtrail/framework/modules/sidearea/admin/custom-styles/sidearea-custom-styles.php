<?php

if ( ! function_exists( 'xtrail_select_side_area_slide_from_right_type_style' ) ) {
	function xtrail_select_side_area_slide_from_right_type_style() {
		
		if ( xtrail_select_options()->getOptionValue( 'side_area_type' ) == 'side-menu-slide-from-right' ) {
			
			if ( xtrail_select_options()->getOptionValue( 'side_area_width' ) !== '' ) {
				echo xtrail_select_dynamic_css( '.qodef-side-menu-slide-from-right .qodef-side-menu', array(
					'right' => '-' . xtrail_select_options()->getOptionValue( 'side_area_width' ),
					'width' => xtrail_select_options()->getOptionValue( 'side_area_width' )
				) );
			}
			
			if ( xtrail_select_options()->getOptionValue( 'side_area_content_overlay_color' ) !== '' ) {
				
				echo xtrail_select_dynamic_css( '.qodef-side-menu-slide-from-right .qodef-wrapper .qodef-cover', array(
					'background-color' => xtrail_select_options()->getOptionValue( 'side_area_content_overlay_color' )
				) );
			}
			
			if ( xtrail_select_options()->getOptionValue( 'side_area_content_overlay_opacity' ) !== '' ) {
				
				echo xtrail_select_dynamic_css( '.qodef-side-menu-slide-from-right.qodef-right-side-menu-opened .qodef-wrapper .qodef-cover', array(
					'opacity' => xtrail_select_options()->getOptionValue( 'side_area_content_overlay_opacity' )
				) );
			}
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_side_area_slide_from_right_type_style' );
}

if ( ! function_exists( 'xtrail_select_side_area_slide_with_content_type_style' ) ) {
	function xtrail_select_side_area_slide_with_content_type_style() {
		
		if ( xtrail_select_options()->getOptionValue( 'side_area_type' ) == 'side-menu-slide-with-content' ) {
			
			if ( xtrail_select_options()->getOptionValue( 'side_area_width' ) !== '' ) {
				echo xtrail_select_dynamic_css( '.qodef-side-menu-slide-with-content .qodef-side-menu', array(
					'right' => '-' . xtrail_select_options()->getOptionValue( 'side_area_width' ),
					'width' => xtrail_select_options()->getOptionValue( 'side_area_width' )
				) );
				
				$side_menu_open_classes = array(
					'.qodef-side-menu-slide-with-content.qodef-side-menu-open .qodef-wrapper',
					'.qodef-side-menu-slide-with-content.qodef-side-menu-open footer.uncover',
					'.qodef-side-menu-slide-with-content.qodef-side-menu-open .qodef-sticky-header',
					'.qodef-side-menu-slide-with-content.qodef-side-menu-open .qodef-fixed-wrapper',
					'.qodef-side-menu-slide-with-content.qodef-side-menu-open .qodef-mobile-header-inner',
				);
				
				echo xtrail_select_dynamic_css( $side_menu_open_classes, array(
					'left' => '-' . xtrail_select_options()->getOptionValue( 'side_area_width' ),
				) );
			}
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_side_area_slide_with_content_type_style' );
}

if ( ! function_exists( 'xtrail_select_side_area_uncovered_from_content_type_style' ) ) {
	function xtrail_select_side_area_uncovered_from_content_type_style() {
		
		if ( xtrail_select_options()->getOptionValue( 'side_area_type' ) == 'side-area-uncovered-from-content' ) {
			
			if ( xtrail_select_options()->getOptionValue( 'side_area_width' ) !== '' ) {
				echo xtrail_select_dynamic_css( '.qodef-side-area-uncovered-from-content .qodef-side-menu', array(
					'width' => xtrail_select_options()->getOptionValue( 'side_area_width' )
				) );
				
				$side_menu_open_classes = array(
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened .qodef-wrapper',
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened footer.uncover',
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened .qodef-sticky-header',
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened .qodef-fixed-wrapper.fixed',
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened .qodef-mobile-header-inner',
					'.qodef-side-area-uncovered-from-content.qodef-right-side-menu-opened .mobile-header-appear .qodef-mobile-header-inner',
				);
				
				echo xtrail_select_dynamic_css( $side_menu_open_classes, array(
					'left' => '-' . xtrail_select_options()->getOptionValue( 'side_area_width' ),
				) );
			}
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_side_area_uncovered_from_content_type_style' );
}

if ( ! function_exists( 'xtrail_select_side_area_icon_color_styles' ) ) {
	function xtrail_select_side_area_icon_color_styles() {
		$icon_color             = xtrail_select_options()->getOptionValue( 'side_area_icon_color' );
		$icon_background_color  = xtrail_select_options()->getOptionValue( 'side_area_icon_background_color' );
		$icon_hover_color       = xtrail_select_options()->getOptionValue( 'side_area_icon_hover_color' );
		$close_icon_color       = xtrail_select_options()->getOptionValue( 'side_area_close_icon_color' );
		$close_icon_background_color = xtrail_select_options()->getOptionValue( 'side_area_close_icon_background_color' );
		$close_icon_hover_color = xtrail_select_options()->getOptionValue( 'side_area_close_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.qodef-side-menu-button-opener:hover > .qodef-side-menu-icon-holder > .qodef-side-menu-title',
			'.qodef-side-menu-button-opener.opened > .qodef-side-menu-icon-holder > .qodef-side-menu-icon'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo xtrail_select_dynamic_css( '
			.qodef-side-menu-button-opener > .qodef-side-menu-icon-holder > .qodef-side-menu-title,
			.qodef-side-menu-button-opener > .qodef-side-menu-icon-holder > .qodef-side-menu-icon', array(
				'color' => $icon_color
			) );
		}

		if ( ! empty( $icon_background_color ) ) {

			$background_transparency = 1;
			if ( xtrail_select_options()->getOptionValue( 'side_area_icon_background_transparency' ) !== '' ) {
				$background_transparency = xtrail_select_options()->getOptionValue( 'side_area_icon_background_transparency' );
			}

			$background_color = xtrail_select_rgba_color( $icon_background_color, $background_transparency );

			echo xtrail_select_dynamic_css( '
			.qodef-side-menu-button-opener', array(
				'background-color' => $background_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo xtrail_select_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color
			) );
		}
		
		if ( ! empty( $close_icon_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-side-menu a.qodef-close-side-menu', array(
				'color' => $close_icon_color
			) );
		}

		if ( ! empty( $close_icon_background_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-side-menu a.qodef-close-side-menu', array(
				'background-color' => $close_icon_background_color
			) );
		}
		
		if ( ! empty( $close_icon_hover_color ) ) {
			echo xtrail_select_dynamic_css( '.qodef-side-menu a.qodef-close-side-menu:hover', array(
				'color' => $close_icon_hover_color
			) );
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_side_area_icon_color_styles' );
}

if ( ! function_exists( 'xtrail_select_side_area_styles' ) ) {
	function xtrail_select_side_area_styles() {
		$side_area_styles = array();
		$background_color = xtrail_select_options()->getOptionValue( 'side_area_background_color' );
		$background_image = xtrail_select_options()->getOptionValue( 'side_area_background_image' );
		$padding          = xtrail_select_options()->getOptionValue( 'side_area_padding' );
		$text_alignment   = xtrail_select_options()->getOptionValue( 'side_area_aligment' );
		
		if ( ! empty( $background_color ) ) {
			$side_area_styles['background-color'] = $background_color;
		}

		if ( ! empty( $background_image ) ) {
			$side_area_styles['background-image'] = 'url("' .$background_image. '")';
		}
		
		if ( ! empty( $padding ) ) {
			$side_area_styles['padding'] = esc_attr( $padding );
		}
		
		if ( ! empty( $text_alignment ) ) {
			$side_area_styles['text-align'] = $text_alignment;
		}
		
		if ( ! empty( $side_area_styles ) ) {
			echo xtrail_select_dynamic_css( '.qodef-side-menu', $side_area_styles );
		}
		
		if ( $text_alignment === 'center' ) {
			echo xtrail_select_dynamic_css( '.qodef-side-menu .widget img', array(
				'margin' => '0 auto'
			) );
		}
	}
	
	add_action( 'xtrail_select_action_style_dynamic', 'xtrail_select_side_area_styles' );
}