<?php
    $related_events = xtrail_select_get_events_related_post_type(get_the_ID());
    $related_events_image_size = isset($related_events_image_size) ? $related_events_image_size : 'thumbnail';
?>
    <div class="qodef-related-events-holder clearfix">
        <?php if ( $related_events && $related_events->have_posts() ) : ?>
            <h4 class="qodef-related-events-title"><?php esc_html_e('Related Events', 'xtrail' ); ?></h4>
            <div class="qodef-related-events-inner clearfix">
                <?php while ( $related_events->have_posts() ) : $related_events->the_post(); ?>
                    <div class="qodef-related-event">
                        <div class="qodef-related-event-inner">
		                    <?php if (has_post_thumbnail()) { ?>
                            <div class="qodef-related-event-image">
                                <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                     <?php the_post_thumbnail($related_events_image_size); ?>
                                </a>
                            </div>
		                    <?php }	?>
                            <div class="qodef-related-event-info">
                                <h6 itemprop="name" class="entry-title qodef-event-title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
                                <?php xtrail_select_get_module_template_part('templates/parts/date', 'timetable-schedule', '', $params); ?>
                                <?php xtrail_select_get_module_template_part('templates/parts/author', 'timetable-schedule', '', $params); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>