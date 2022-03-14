<div class="qodef-event-list-read-more-button">
	<?php

	echo xtrail_select_get_button_html( apply_filters( 'xtrail_select_blog_template_read_more_button', array(
		'type'         => 'simple',
		'size'         => 'small',
		'link'         => get_the_permalink(),
		'text'         => esc_html__( 'View More', 'xtrail-core' ),
		'custom_class' => ''
	) ) ); ?>

</div>
