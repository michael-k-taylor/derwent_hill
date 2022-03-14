<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="qodef-container">
		<div class="qodef-container-inner clearfix">
	<?php } ?>
			<div class="qodef-form-holder-outer">
				<div class="qodef-form-holder">
					<div class="qodef-form-holder-inner">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 250 242" enable-background="new 0 0 250 242" xml:space="preserve">
                            <path fill="none" stroke="#FED620" stroke-width="19" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
	                        M199,105.5c0,51.6-41.9,93.5-93.5,93.5C53.9,199,12,157.2,12,105.5C12,53.9,53.9,12,105.5,12C157.2,12,199,53.9,199,105.5z"/>
                            <line fill="none" stroke="#FED620" stroke-width="19" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="176.9" y1="173.5" x2="235.1" y2="224.6"/>
                        </svg>
						<input type="text" placeholder="<?php esc_attr_e( 'Type Your Search...', 'xtrail' ); ?>" name="s" class="qodef_search_field" autocomplete="off" required />
					</div>
                </div>
                <a class="qodef-search-close" href="#">
                    <span class="qodef-hm-lines">
                        <span class="qodef-hm-line qodef-line-1"></span>
                        <span class="qodef-hm-line qodef-line-2"></span>
                        <span class="qodef-hm-line qodef-line-3"></span>
                    </span>
                </a>
			</div>
	<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>