<?php
$share_type = isset( $share_type ) ? $share_type : 'dropdown';
?>
<?php if ( xtrail_select_is_plugin_installed( 'core' ) && xtrail_select_options()->getOptionValue( 'enable_social_share' ) === 'yes' && xtrail_select_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="qodef-blog-share">
		<?php echo xtrail_select_get_social_share_html( array( 'type' => $share_type, 'dropdown_behavior' => 'left' ) ); ?>
	</div>
<?php } ?>