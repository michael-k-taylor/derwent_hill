<?php
	$month = get_the_time('m');
	$year = get_the_time('Y');
?>
<div class="qodef-event-info-date">
	<!--<a itemprop="url" href="<?php /*echo get_month_link($year, $month); */?>">-->
		<span class="qodef-event-info-date-date"><?php the_time('j'); ?></span>
		<span class="qodef-event-info-date-month"><?php the_time('F'); ?></span>
		<span class="qodef-event-info-date-year"><?php the_time('Y'); ?></span>
	<!--</a>-->
</div>