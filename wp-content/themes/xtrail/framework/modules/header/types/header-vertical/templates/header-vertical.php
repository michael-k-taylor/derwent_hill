<?php do_action('xtrail_select_action_before_page_header'); ?>

<aside class="qodef-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
	<div class="qodef-vertical-menu-area-inner">
		<div class="qodef-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			xtrail_select_get_logo();
		} ?>
		<?php xtrail_select_get_header_vertical_main_menu(); ?>
		<div class="qodef-vertical-area-widget-holder">
			<?php xtrail_select_get_header_widget_area_one(); ?>
		</div>
	</div>
</aside>

<?php do_action('xtrail_select_action_after_page_header'); ?>