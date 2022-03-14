<?php

if ( ! function_exists( 'xtrail_select_include_blog_shortcodes' ) ) {
	function xtrail_select_include_blog_shortcodes() {
		foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( xtrail_select_is_plugin_installed( 'core' ) ) {
		add_action( 'xtrail_core_action_include_shortcodes_file', 'xtrail_select_include_blog_shortcodes' );
	}
}
