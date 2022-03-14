<?php

$qodef_sidebar_layout  = xtrail_select_sidebar_layout();

get_header();
xtrail_select_get_title();
do_action('xtrail_select_action_before_main_content');
?>

<div class="qodef-container qodef-default-page-template">
<?php do_action('xtrail_select_action_after_container_open'); ?>
    <div class="qodef-container-inner clearfix">
        <div class="qodef-grid-row">
                <div <?php echo xtrail_select_get_content_sidebar_class(); ?>>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php echo xtrail_select_get_module_template_part( 'templates/events-archive', 'timetable-schedule', '', $params ); ?>
                    <?php endwhile; endif; ?>
                </div>
            <?php if($qodef_sidebar_layout !== 'no-sidebar') { ?>
                <div <?php echo xtrail_select_get_sidebar_holder_class(); ?>>
                    <?php get_sidebar(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php do_action('xtrail_select_action_before_container_close'); ?>

<?php get_footer(); ?>