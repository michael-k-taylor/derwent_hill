<div class="qodef-event-list-item-holder">
	<a itemprop="url" href="<?php echo get_permalink(); ?>" target="<?php echo esc_attr( "_self" ); ?>"></a>
	<?php echo xtrail_core_get_shortcode_module_template_part('templates/parts/image', 'event-list'); ?>
	<div class="qodef-event-list-item-content">
		<div class="qodef-event-list-item-content-holder">
			<div class="qodef-event-list-item-content-inner">
				<?php
					echo xtrail_core_get_shortcode_module_template_part('templates/parts/date', 'event-list', '', $params);
					echo xtrail_core_get_shortcode_module_template_part('templates/parts/title', 'event-list', '', $params);
					echo xtrail_core_get_shortcode_module_template_part('templates/parts/category', 'event-list', '', $params);
				?>
			</div>
		</div>
	</div>
</div>