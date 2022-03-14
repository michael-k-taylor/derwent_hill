<div class="qodef-fullscreen-menu-holder-outer">
	<div class="qodef-fullscreen-menu-holder">
		<div class="qodef-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="qodef-container-inner">
			<?php endif; ?>

			<div class="qodef-fullscreen-above-menu-widget-holder">
				<?php xtrail_select_get_header_widget_area_one(); ?>
			</div>
			
			<?php 
			//Navigation
			xtrail_select_get_module_template_part('templates/full-screen-menu-navigation', 'header/types/header-minimal');;

			?>

			<div class="qodef-fullscreen-below-menu-widget-holder">
				<?php xtrail_select_get_header_widget_area_two(); ?>
			</div>
			
			<?php if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>