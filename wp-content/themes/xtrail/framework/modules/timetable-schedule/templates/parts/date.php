<?php
$month = get_the_time('m');
$year = get_the_time('Y');
?>
<div class="qodef-single-event-info-date">
    <span class="qodef-event-info-date-date"><?php the_time('j'); ?></span>
    <span class="qodef-event-info-date-month"><?php the_time('F'); ?></span>,
    <span class="qodef-event-info-date-year"><?php the_time('Y'); ?></span>
</div>