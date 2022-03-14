<?php

if ( ! function_exists( 'xtrail_select_sticky_header_global_js_var' ) ) {
	function xtrail_select_sticky_header_global_js_var( $global_variables ) {
		$global_variables['qodefStickyHeaderHeight']             = xtrail_select_get_sticky_header_height();
		$global_variables['qodefStickyHeaderTransparencyHeight'] = xtrail_select_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'xtrail_select_filter_js_global_variables', 'xtrail_select_sticky_header_global_js_var' );
}

if ( ! function_exists( 'xtrail_select_sticky_header_per_page_js_var' ) ) {
	function xtrail_select_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['qodefStickyScrollAmount'] = xtrail_select_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'xtrail_select_filter_per_page_js_vars', 'xtrail_select_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'xtrail_select_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function xtrail_select_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'xtrail' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'xtrail' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'xtrail_select_register_sticky_header_areas' );
}

if ( ! function_exists( 'xtrail_select_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function xtrail_select_get_sticky_menu( $additional_class = 'qodef-default-nav' ) {
		xtrail_select_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function xtrail_select_get_sticky_header( $slug = '', $module = '' ) {
        $page_id             = xtrail_select_get_page_id();
		$sticky_in_grid      = xtrail_select_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes';
		$header_in_grid_meta = get_post_meta( $page_id, 'qodef_menu_area_in_grid_meta', true);
		$menu_area_position  = xtrail_select_get_meta_field_intersect( 'set_menu_area_position', $page_id );
		
		if ( $header_in_grid_meta === 'yes' && ! $sticky_in_grid ) {
			$sticky_in_grid = true;
		} else if ( $header_in_grid_meta === 'no' && $sticky_in_grid ) {
			$sticky_in_grid = false;
		}
		
		$parameters = array(
			'hide_logo'                  => xtrail_select_options()->getOptionValue( 'hide_logo' ) == 'yes',
			'sticky_header_in_grid'      => $sticky_in_grid,
			'fullscreen_menu_icon_class' => xtrail_select_get_fullscreen_menu_icon_class(),
            'menu_area_position'    	 => $menu_area_position,
			'menu_area_class'       	 => ! empty( $menu_area_position ) ? 'qodef-menu-' . $menu_area_position : ''
		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		xtrail_select_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_header_widget_menu_area' ) ) {
	/**
	 * Loads sticky header widgets area HTML
	 */
	function xtrail_select_get_sticky_header_widget_menu_area() {
		$page_id                 = xtrail_select_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'qodef_custom_sticky_menu_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'qodef-sticky-right' ) && empty( $custom_menu_widget_area ) ) {
			dynamic_sidebar( 'qodef-sticky-right' );
		} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
			dynamic_sidebar( $custom_menu_widget_area );
		}
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function xtrail_select_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'xtrail_select_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = xtrail_select_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = xtrail_select_filter_px( xtrail_select_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function xtrail_select_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'xtrail_select_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = xtrail_select_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && xtrail_select_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = xtrail_select_filter_px( xtrail_select_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'xtrail_select_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function xtrail_select_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'xtrail_select_filter_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = xtrail_select_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = xtrail_select_filter_px( xtrail_select_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}