<?php

if ( xtrail_select_is_timetable_schedule_installed() ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/timetable-schedule/timetable-functions.php';
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/timetable-schedule/visual-composer-map.php';
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/timetable-schedule/custom-styles/timetable-custom-styles.php';
}