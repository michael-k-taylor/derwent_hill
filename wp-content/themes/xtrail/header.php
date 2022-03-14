<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * xtrail_select_action_header_meta hook
	 *
	 * @see xtrail_select_header_meta() - hooked with 10
	 * @see xtrail_select_user_scalable_meta - hooked with 10
	 * @see xtrail_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'xtrail_select_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
    <div class="qodef-wrapper">
        <div class="qodef-wrapper-inner">
            <?php
            /**
             * xtrail_select_action_after_wrapper_inner hook
             *
             * @see xtrail_select_get_header() - hooked with 10
             * @see xtrail_select_get_mobile_header() - hooked with 20
             * @see xtrail_select_back_to_top_button() - hooked with 30
             * @see xtrail_select_get_header_minimal_full_screen_menu() - hooked with 40
             * @see xtrail_select_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'xtrail_select_action_after_wrapper_inner' ); ?>
	        
            <div class="qodef-content" <?php xtrail_select_content_elem_style_attr(); ?>>
                <div class="qodef-content-inner">