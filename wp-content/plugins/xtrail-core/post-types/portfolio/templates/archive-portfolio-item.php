<?php
get_header();
xtrail_select_get_title();
do_action( 'xtrail_select_action_before_main_content' ); ?>
<div class="qodef-container qodef-default-page-template">
	<?php do_action( 'xtrail_select_action_after_container_open' ); ?>
	<div class="qodef-container-inner clearfix">
		<?php
			$xtrail_taxonomy_id   = get_queried_object_id();
			$xtrail_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$xtrail_taxonomy      = ! empty( $xtrail_taxonomy_id ) ? get_term_by( 'id', $xtrail_taxonomy_id, $xtrail_taxonomy_type ) : '';
			$xtrail_taxonomy_slug = ! empty( $xtrail_taxonomy ) ? $xtrail_taxonomy->slug : '';
			$xtrail_taxonomy_name = ! empty( $xtrail_taxonomy ) ? $xtrail_taxonomy->taxonomy : '';
			
			xtrail_core_get_archive_portfolio_list( $xtrail_taxonomy_slug, $xtrail_taxonomy_name );
		?>
	</div>
	<?php do_action( 'xtrail_select_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
