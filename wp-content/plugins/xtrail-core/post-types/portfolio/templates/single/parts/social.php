<?php if ( xtrail_select_options()->getOptionValue( 'enable_social_share' ) == 'yes' && xtrail_select_options()->getOptionValue( 'enable_social_share_on_portfolio_item' ) == 'yes' ) : ?>
	<div class="qodef-ps-info-item qodef-ps-social-share">
		<?php
		/**
		 * Available params type, icon_type and title
		 *
		 * Return social share html
		 */
		echo xtrail_select_get_social_share_html( array( 'type'  => 'list', 'title' => esc_attr__( 'Share', 'xtrail-core' ) ) ); ?>
	</div>
<?php endif; ?>