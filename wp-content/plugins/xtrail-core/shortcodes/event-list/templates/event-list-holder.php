<div class="qodef-event-list-holder <?php echo esc_attr($holder_classes); ?>">
    <?php
    if($query_results->have_posts()):
        while ( $query_results->have_posts() ) : $query_results->the_post();
            echo xtrail_core_get_shortcode_module_template_part( 'templates/event-list-item', 'event-list', $type, $params );
        endwhile;
    else:
        echo xtrail_core_get_shortcode_module_template_part('templates/event-list-item', 'event-list');
    endif;
    wp_reset_postdata();
    ?>
</div>