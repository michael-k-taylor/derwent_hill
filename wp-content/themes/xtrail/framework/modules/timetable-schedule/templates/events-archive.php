<article class="qodef-ttevents-single">
    <div class="qodef-ttevents-single-heading">
        <?php if(has_post_thumbnail()) : ?>
            <div class="qodef-ttevents-single-image-holder">
                <a itemprop="url" href="<?php echo get_permalink(); ?>" target="<?php echo esc_attr( "_self" ); ?>">
                    <?php the_post_thumbnail('full'); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php xtrail_select_get_module_template_part('templates/parts/category', 'timetable-schedule', ''); ?>
    </div>
    <div class="qodef-ttevents-single-holder">
        <?php xtrail_select_get_module_template_part('templates/parts/date', 'timetable-schedule', ''); ?>
        <h3 class="qodef-ttevents-single-title">
            <a itemprop="url" href="<?php echo get_permalink(); ?>" target="<?php echo esc_attr( "_self" ); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="qodef-ttevents-single-content">
            <?php
            $excerpt        = xtrail_select_excerpt( '70' );
            echo wp_kses_post( $excerpt ); ?>
        </div>
    </div>
</article>