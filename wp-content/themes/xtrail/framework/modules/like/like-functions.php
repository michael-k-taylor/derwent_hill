<?php

if ( ! function_exists( 'xtrail_select_like' ) ) {
	/**
	 * Returns XtrailSelectClassLike instance
	 *
	 * @return XtrailSelectClassLike
	 */
	function xtrail_select_like() {
		return XtrailSelectClassLike::get_instance();
	}
}

function xtrail_select_get_like() {
	
	echo wp_kses( xtrail_select_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}