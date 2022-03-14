<div class="qodef-event-list-item-holder">
	<?php echo xtrail_core_get_shortcode_module_template_part('templates/parts/image', 'event-list'); ?>
    <div class="qodef-event-list-item-content">
        <div class="qodef-event-list-item-content-holder">
            <div class="qodef-event-list-item-content-inner">
				<?php
				echo xtrail_core_get_shortcode_module_template_part('templates/parts/date', 'event-list', '', $params);
				echo xtrail_core_get_shortcode_module_template_part('templates/parts/category', 'event-list', '', $params);
				echo xtrail_core_get_shortcode_module_template_part('templates/parts/title', 'event-list', '', $params);
				echo xtrail_core_get_shortcode_module_template_part('templates/parts/excerpt', 'event-list', '', $params);
				echo xtrail_core_get_shortcode_module_template_part('templates/parts/read-more', 'event-list', '', $params);
				?>
            </div>
        </div>
    </div>
</div>