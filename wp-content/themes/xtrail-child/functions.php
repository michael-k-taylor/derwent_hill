<?php

/*** Child Theme Function  ***/

if (!function_exists('xtrail_select_child_theme_enqueue_scripts')) {
    function xtrail_select_child_theme_enqueue_scripts()
    {
        $parent_style = 'xtrail-select-default-style';

        wp_enqueue_style('xtrail-select-child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
    }

    add_action('wp_enqueue_scripts', 'xtrail_select_child_theme_enqueue_scripts');
}

add_action('admin_head', function () {
    $user = wp_get_current_user();

    if ($user->ID != 1) {
        ?>
		<style>
			#toplevel_page_xtrail_select_theme_menu,
			#toplevel_page_vc-general,
			#toplevel_page_booked-appointments,
			#menu-posts-timetable_weekdays,
			#toplevel_page_timetable_admin_bookings,
			#toplevel_page_timetable_admin,
			#menu-posts-events
			{
				display:none;
			}
		</style>
        <?php
    }
});