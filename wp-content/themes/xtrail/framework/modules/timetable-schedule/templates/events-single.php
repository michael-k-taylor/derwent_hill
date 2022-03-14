<div class="qodef-ttevents-single">
    <div class="qodef-ttevents-single-heading">
        <?php if(has_post_thumbnail()) : ?>
            <div class="qodef-ttevents-single-image-holder">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
		<?php xtrail_select_get_module_template_part('templates/parts/category', 'timetable-schedule', '', $params); ?>
    </div>
    <div class="qodef-ttevents-single-holder">
        <?php if(!empty($subtitle)) : ?>
            <p class="qodef-ttevents-single-subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>
        <?php xtrail_select_get_module_template_part('templates/parts/date', 'timetable-schedule', '', $params); ?>
        <h3 class="qodef-ttevents-single-title"><?php the_title(); ?></h3>
        <div class="qodef-ttevents-single-content">
            <?php the_content(); ?>
			<?php xtrail_select_get_module_template_part('templates/parts/author-info', 'timetable-schedule', '', $params); ?>
			<?php xtrail_select_get_module_template_part('templates/parts/related-events', 'timetable-schedule', '', $params); ?>
        </div>
    </div>
</div>
