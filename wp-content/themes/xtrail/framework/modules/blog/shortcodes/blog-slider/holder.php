<div class="qodef-blog-slider-holder <?php echo esc_attr( $slider_classes ); ?>">
	<ul class="qodef-blog-slider qodef-owl-slider" <?php echo xtrail_select_get_inline_attrs( $slider_data ); ?>>
		<?php
		if ( $query_result->have_posts() ):
			while ( $query_result->have_posts() ) : $query_result->the_post();
				xtrail_select_get_module_template_part( 'shortcodes/blog-slider/layout-collections/' . $slider_type, 'blog', '', $params );
			endwhile;
		else: ?>
			<div class="qodef-blog-slider-message">
				<p><?php esc_html_e( 'No posts were found.', 'xtrail' ); ?></p>
			</div>
		<?php endif;
		
		wp_reset_postdata();
		?>
	</ul>
</div>
