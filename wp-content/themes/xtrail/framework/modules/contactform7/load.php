<?php

if ( xtrail_select_is_plugin_installed( 'contact-form-7' ) ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR.'/contactform7/options-map/map.php';
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR.'/contactform7/custom-styles/contact-form.php';
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR.'/contactform7/contact-form-7-config.php';
}