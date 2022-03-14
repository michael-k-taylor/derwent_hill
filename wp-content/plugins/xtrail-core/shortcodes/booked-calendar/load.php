<?php

if (function_exists('xtrail_core_is_booked_calendar_installed')) {
    if (xtrail_core_is_booked_calendar_installed()) {
        include_once XTRAIL_CORE_SHORTCODES_PATH . '/booked-calendar/functions.php';
        include_once XTRAIL_CORE_SHORTCODES_PATH . '/booked-calendar/booked-calendar.php';
    }
}