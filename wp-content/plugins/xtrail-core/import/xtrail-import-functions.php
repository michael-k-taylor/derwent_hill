<?php

if ( ! function_exists( 'xtrail_core_import_object' ) ) {
	function xtrail_core_import_object() {
		$xtrail_core_import_object = new XtrailCoreImport();
	}
	
	add_action( 'init', 'xtrail_core_import_object' );
}

if ( ! function_exists( 'xtrail_core_data_import' ) ) {
	function xtrail_core_data_import() {
		$importObject = XtrailCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "xtrail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_xtrail_core_data_import', 'xtrail_core_data_import' );
}

if ( ! function_exists( 'xtrail_core_widgets_import' ) ) {
	function xtrail_core_widgets_import() {
		$importObject = XtrailCoreImport::getInstance();
		
		$folder = "xtrail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_xtrail_core_widgets_import', 'xtrail_core_widgets_import' );
}

if ( ! function_exists( 'xtrail_core_options_import' ) ) {
	function xtrail_core_options_import() {
		$importObject = XtrailCoreImport::getInstance();
		
		$folder = "xtrail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_xtrail_core_options_import', 'xtrail_core_options_import' );
}

if ( ! function_exists( 'xtrail_core_other_import' ) ) {
	function xtrail_core_other_import() {
		$importObject = XtrailCoreImport::getInstance();
		
		$folder = "xtrail/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->qodef_update_meta_fields_after_import($folder);
		$importObject->qodef_update_options_after_import($folder);

		if ( xtrail_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_xtrail_core_other_import', 'xtrail_core_other_import' );
}