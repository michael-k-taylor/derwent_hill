<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-event-list-item-image">
		<div class="qodef-event-list-item-image-inner">
			<a itemprop="url" href="<?php echo get_permalink(); ?>" target="<?php echo esc_attr( "_self" ); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'xtrail_select_image_square' ); ?>
			</a>
		</div>
	</div>
<?php } ?>