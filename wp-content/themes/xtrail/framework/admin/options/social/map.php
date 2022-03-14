<?php

if ( ! function_exists( 'xtrail_select_social_options_map' ) ) {
	function xtrail_select_social_options_map() {

	    $page = '_social_page';
		
		xtrail_select_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__( 'Social Networks', 'xtrail' ),
				'icon'  => 'fa fa-share-alt'
			)
		);
		
		/**
		 * Enable Social Share
		 */
		$panel_social_share = xtrail_select_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_social_share',
				'title' => esc_html__( 'Enable Social Share', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Social Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow social share on networks of your choice', 'xtrail' ),
				'parent'        => $panel_social_share
			)
		);
		
		$panel_show_social_share_on = xtrail_select_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_show_social_share_on',
				'title'           => esc_html__( 'Show Social Share On', 'xtrail' ),
				'dependency' => array(
					'show' => array(
						'enable_social_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_post',
				'default_value' => 'no',
				'label'         => esc_html__( 'Posts', 'xtrail' ),
				'description'   => esc_html__( 'Show Social Share on Blog Posts', 'xtrail' ),
				'parent'        => $panel_show_social_share_on
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_page',
				'default_value' => 'no',
				'label'         => esc_html__( 'Pages', 'xtrail' ),
				'description'   => esc_html__( 'Show Social Share on Pages', 'xtrail' ),
				'parent'        => $panel_show_social_share_on
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
		do_action('xtrail_select_action_post_types_social_share', $panel_show_social_share_on);
		
		/**
		 * Social Share Networks
		 */
		$panel_social_networks = xtrail_select_add_admin_panel(
			array(
				'page'            => '_social_page',
				'name'            => 'panel_social_networks',
				'title'           => esc_html__( 'Social Networks', 'xtrail' ),
				'dependency' => array(
					'hide' => array(
						'enable_social_share'  => 'no'
					)
				)
			)
		);
		
		/**
		 * Facebook
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'facebook_title',
				'title'  => esc_html__( 'Share on Facebook', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_facebook_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Facebook', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_facebook_share_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_facebook_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_facebook_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'facebook_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_facebook_share_container
			)
		);
		
		/**
		 * Twitter
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'twitter_title',
				'title'  => esc_html__( 'Share on Twitter', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_twitter_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Twitter', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_twitter_share_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_twitter_share_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_twitter_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'twitter_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'twitter_via',
				'default_value' => '',
				'label'         => esc_html__( 'Via', 'xtrail' ),
				'parent'        => $enable_twitter_share_container
			)
		);
		
		/**
		 * LinkedIn
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'linkedin_title',
				'title'  => esc_html__( 'Share on LinkedIn', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_linkedin_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via LinkedIn', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_linkedin_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_linkedin_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_linkedin_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'linkedin_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_linkedin_container
			)
		);
		
		/**
		 * Tumblr
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'tumblr_title',
				'title'  => esc_html__( 'Share on Tumblr', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_tumblr_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Tumblr', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_tumblr_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_tumblr_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_tumblr_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'tumblr_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_tumblr_container
			)
		);
		
		/**
		 * Pinterest
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'pinterest_title',
				'title'  => esc_html__( 'Share on Pinterest', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_pinterest_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via Pinterest', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_pinterest_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_pinterest_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_pinterest_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'pinterest_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_pinterest_container
			)
		);
		
		/**
		 * VK
		 */
		xtrail_select_add_admin_section_title(
			array(
				'parent' => $panel_social_networks,
				'name'   => 'vk_title',
				'title'  => esc_html__( 'Share on VK', 'xtrail' )
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_vk_share',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Share', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow sharing via VK', 'xtrail' ),
				'parent'        => $panel_social_networks
			)
		);
		
		$enable_vk_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_vk_container',
				'parent'          => $panel_social_networks,
				'dependency' => array(
					'show' => array(
						'enable_vk_share'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'vk_icon',
				'default_value' => '',
				'label'         => esc_html__( 'Upload Icon', 'xtrail' ),
				'parent'        => $enable_vk_container
			)
		);
		
		if ( defined( 'XTRAIL_TWITTER_FEED_VERSION' ) ) {
			$twitter_panel = xtrail_select_add_admin_panel(
				array(
					'title' => esc_html__( 'Twitter', 'xtrail' ),
					'name'  => 'panel_twitter',
					'page'  => '_social_page'
				)
			);
			
			xtrail_select_add_admin_twitter_button(
				array(
					'name'   => 'twitter_button',
					'parent' => $twitter_panel
				)
			);
		}
		
		if ( defined( 'XTRAIL_INSTAGRAM_FEED_VERSION' ) ) {
			$instagram_panel = xtrail_select_add_admin_panel(
				array(
					'title' => esc_html__( 'Instagram', 'xtrail' ),
					'name'  => 'panel_instagram',
					'page'  => '_social_page'
				)
			);
			
			xtrail_select_add_admin_instagram_button(
				array(
					'name'   => 'instagram_button',
					'parent' => $instagram_panel
				)
			);
		}
		
		/**
		 * Open Graph
		 */
		$panel_open_graph = xtrail_select_add_admin_panel(
			array(
				'page'  => '_social_page',
				'name'  => 'panel_open_graph',
				'title' => esc_html__( 'Open Graph', 'xtrail' ),
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_open_graph',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Open Graph', 'xtrail' ),
				'description'   => esc_html__( 'Enabling this option will allow usage of Open Graph protocol on your site', 'xtrail' ),
				'parent'        => $panel_open_graph
			)
		);
		
		$enable_open_graph_container = xtrail_select_add_admin_container(
			array(
				'name'            => 'enable_open_graph_container',
				'parent'          => $panel_open_graph,
				'dependency' => array(
					'show' => array(
						'enable_open_graph'  => 'yes'
					)
				)
			)
		);
		
		xtrail_select_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'open_graph_image',
				'default_value' => SELECT_ASSETS_ROOT . '/img/open_graph.png',
				'label'         => esc_html__( 'Default Share Image', 'xtrail' ),
				'parent'        => $enable_open_graph_container,
				'description'   => esc_html__( 'Used when featured image is not set. Make sure that image is at least 1200 x 630 pixels, up to 8MB in size', 'xtrail' ),
			)
		);

        /**
         * Action for embedding social share option for custom post types
         */
        do_action('xtrail_select_action_social_options', $page);
	}
	
	add_action( 'xtrail_select_action_options_map', 'xtrail_select_social_options_map', xtrail_select_set_options_map_position( 'social' ) );
}