<?php

if ( ! function_exists( 'xtrail_core_get_cpt_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $post_type name of the post type of shortcode
	 * @param string $shortcode name of the shortcode
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param array $additional_params array of additional parameters to pass to template
	 *
	 * @return html
	 */
	function xtrail_core_get_cpt_shortcode_module_template_part( $post_type, $shortcode, $template, $slug = '', $params = array(), $additional_params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = XTRAIL_CORE_CPT_PATH . '/' . $post_type . '/shortcodes/' . $shortcode . '/templates';
		
		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		if ( is_array( $additional_params ) && count( $additional_params ) ) {
			extract( $additional_params );
		}
		
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'xtrail_core_get_cpt_single_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $cpt_name name of the cpt folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function xtrail_core_get_cpt_single_module_template_part( $template, $cpt_name, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = XTRAIL_CORE_CPT_PATH . '/' . $cpt_name;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		if ( ! empty( $template ) ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		print $html;
	}
}

if ( ! function_exists( 'xtrail_core_return_cpt_single_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $cpt_name name of the cpt folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function xtrail_core_return_cpt_single_module_template_part( $template, $cpt_name, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = XTRAIL_CORE_CPT_PATH . '/' . $cpt_name;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		if ( ! empty( $template ) ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'xtrail_core_get_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $shortcode name of the shortcode folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 */
	function xtrail_core_get_shortcode_module_template_part( $template, $shortcode, $slug = '', $params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = XTRAIL_CORE_SHORTCODES_PATH . '/' . $shortcode;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'xtrail_core_get_module_template_part' ) ) {
    /**
     * Loads module template part.
     *
     * @param string $module name of the module to load
     * @param string $template name of the template file
     * @param string $slug
     * @param array $params array of parameters to pass to template
     *
     * @return html
     */
    function xtrail_core_get_module_template_part( $module, $template, $slug = '', $params = array() ) {

        //HTML Content from template
        $html          = '';
        $template_path = XTRAIL_CORE_ABS_PATH . '/' . $module . '/templates';

        $temp = $template_path . '/' . $template;

        if ( is_array( $params ) && count( $params ) ) {
            extract( $params );
        }

        $template = '';

        if ( ! empty( $temp ) ) {
            if ( ! empty( $slug ) ) {
                $template = "{$temp}-{$slug}.php";

                if ( ! file_exists( $template ) ) {
                    $template = $temp . '.php';
                }
            } else {
                $template = $temp . '.php';
            }
        }

        if ( $template ) {
            ob_start();
            include( $template );
            $html = ob_get_clean();
        }

        return $html;
    }
}

if ( ! function_exists( 'xtrail_core_get_module_shortcode_template_part' ) ) {
    /**
     * Loads module template part.
     *
     * @param string $module name of the module to load
     * @param string $shortcode name of the shortcode to load
     * @param string $template name of the template file
     * @param string $slug
     * @param array $params array of parameters to pass to template
     *
     * @return html
     */
    function xtrail_core_get_module_shortcode_template_part( $module, $shortcode, $template, $slug = '', $params = array() ) {

        //HTML Content from template
        $html          = '';
        $template_path = XTRAIL_CORE_ABS_PATH . '/' . $module . '/shortcodes/' . $shortcode . '/templates';

        $temp = $template_path . '/' . $template;

        if ( is_array( $params ) && count( $params ) ) {
            extract( $params );
        }

        $template = '';

        if ( ! empty( $temp ) ) {
            if ( ! empty( $slug ) ) {
                $template = "{$temp}-{$slug}.php";

                if ( ! file_exists( $template ) ) {
                    $template = $temp . '.php';
                }
            } else {
                $template = $temp . '.php';
            }
        }

        if ( $template ) {
            ob_start();
            include( $template );
            $html = ob_get_clean();
        }

        return $html;
    }
}

if ( ! function_exists( 'xtrail_core_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 */
	function xtrail_core_ajax_status( $status, $message, $data = null ) {
		$response = array(
			'status'  => $status,
			'message' => $message,
			'data'    => $data
		);
		
		$output = json_encode( $response );
		
		exit( $output );
	}
}

if ( ! function_exists( 'xtrail_core_add_user_custom_fields' ) ) {
	/**
	 * Function creates custom social fields for users
	 *
	 * return $user_contact
	 */
	function xtrail_core_add_user_custom_fields( $user_contact ) {
		/**
		 * Function that add custom user fields
		 **/
		$user_contact['facebook']   = esc_html__( 'Facebook', 'xtrail-core' );
		$user_contact['twitter']    = esc_html__( 'Twitter', 'xtrail-core' );
		$user_contact['linkedin']   = esc_html__( 'Linkedin', 'xtrail-core' );
		$user_contact['instagram']  = esc_html__( 'Instagram', 'xtrail-core' );
		$user_contact['pinterest']  = esc_html__( 'Pinterest', 'xtrail-core' );
		$user_contact['tumblr']     = esc_html__( 'Tumbrl', 'xtrail-core' );
		$user_contact['googleplus'] = esc_html__( 'Google Plus', 'xtrail-core' );
		
		return $user_contact;
	}
	
	add_filter( 'user_contactmethods', 'xtrail_core_add_user_custom_fields' );
}

if ( ! function_exists( 'xtrail_core_add_additional_user_meta' ) ) {
	function xtrail_core_add_additional_user_meta($user) {
		$user_quo  = get_the_author_meta( 'user_quote', $user->ID );
		$user_pos  = get_the_author_meta( 'user_position', $user->ID );
		?>

        <h3><?php esc_html_e('Additional User Data', 'xtrail_core'); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="user_quote"><?php esc_html_e('Quote', 'xtrail_core'); ?></label></th>
                <td>
                    <input id="user_quote" name="user_quote" class="regular-text" type="text" value="<?php echo ($user_quo) ? esc_attr($user_quo) : '';?>" />
                    <p class="description"><?php _e("User Quote will be displayed in Author Info Box.", 'xtrail_core'); ?></p>
                </td>
            </tr>
            <tr>
                <th><label for="user_position"><?php esc_html_e('Position', 'xtrail_core'); ?></label></th>
                <td>
                    <input id="user_position" name="user_position" class="regular-text" type="text" value="<?php echo ($user_pos) ? esc_attr($user_pos) : '';?>" />
                    <p class="description"><?php _e("User Position will be displayed in Author Info Box.", 'xtrail_core'); ?></p>
                </td>
            </tr>
        </table>
		<?php
	}

	add_action( 'show_user_profile', 'xtrail_core_add_additional_user_meta' );
	add_action( 'edit_user_profile', 'xtrail_core_add_additional_user_meta' );
}

if ( ! function_exists( 'xtrail_core_save_additional_user_meta' ) ) {
	function xtrail_core_save_additional_user_meta( $user_id ) {
		if ( ! current_user_can( 'edit_user', $user_id ) ) {
			return false;
		} else {
			$user_quo  = get_the_author_meta( 'user_quote', $user_id );
			$user_pos  = get_the_author_meta( 'user_position', $user_id );

			if ( isset( $_POST['user_quote'] ) && $_POST['user_quote'] != $user_quo ) {
				update_user_meta( $user_id, 'user_quote', sanitize_text_field( $_POST['user_quote'] ) );
			}

			if ( isset( $_POST['user_position'] ) && $_POST['user_position'] != $user_pos ) {
				update_user_meta( $user_id, 'user_position', sanitize_text_field( $_POST['user_position'] ) );
			}
		}
	}

	add_action( 'personal_options_update', 'xtrail_core_save_additional_user_meta' );
	add_action( 'edit_user_profile_update', 'xtrail_core_save_additional_user_meta' );
}

if ( ! function_exists( 'xtrail_core_set_open_graph_meta' ) ) {
	/*
	 * Function that echoes open graph meta tags if enabled
	 */
	function xtrail_core_set_open_graph_meta() {
		
		if ( xtrail_select_option_get_value( 'enable_open_graph' ) === 'yes' ) {
			
			// get the id
			$id = get_queried_object_id();
			
			// default type is article, override it with product if page is woo single product
			$type        = 'article';
			$description = '';
			
			// check if page is generic wp page w/o page id
			if ( xtrail_select_is_default_wp_template() ) {
				$id = 0;
			}
			
			// check if page is woocommerce shop page
			if ( xtrail_select_is_plugin_installed( 'woocommerce' ) && ( function_exists( 'is_shop' ) && is_shop() ) ) {
				$shop_page_id = get_option( 'woocommerce_shop_page_id' );
				
				if ( ! empty( $shop_page_id ) ) {
					$id = $shop_page_id;
					// set flag
					$description = 'woocommerce-shop';
				}
			}
			
			if ( function_exists( 'is_product' ) && is_product() ) {
				$type = 'product';
			}
			
			// if id exist use wp template tags
			if ( ! empty( $id ) && !is_front_page()  ) {
				$url   = get_permalink( $id );
				$title = get_the_title( $id );

                // apply bloginfo description to woocommerce shop page instead of first product item description
                if ( $description === 'woocommerce-shop' ) {
                    $description = get_bloginfo( 'description' );
                } elseif (get_post_field( 'post_excerpt', $id ) !== '') {
                    $description = strip_tags( apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $id ) ) );
                } else {
                    $description = get_bloginfo( 'description' );
                }


                // has featured image
				if ( get_post_thumbnail_id( $id ) !== '' ) {
					$image = wp_get_attachment_url( get_post_thumbnail_id( $id ) );
				} else {
					$image = xtrail_select_option_get_value( 'open_graph_image' );
				}
			} else {
				global $wp;
				$url         = esc_url( home_url( add_query_arg( array(), $wp->request ) ) );
				$title       = get_bloginfo( 'name' );
				$description = get_bloginfo( 'description' );
				$image       = xtrail_select_option_get_value( 'open_graph_image' );
			}
			?>
			
			<meta property="og:url" content="<?php echo esc_url( $url ); ?>"/>
			<meta property="og:type" content="<?php echo esc_html( $type ); ?>"/>
			<meta property="og:title" content="<?php echo esc_html( $title ); ?>"/>
			<meta property="og:description" content="<?php echo esc_html( $description ); ?>"/>
			<meta property="og:image" content="<?php echo esc_url( $image ); ?>"/>
		
		<?php }
	}
	
	add_action( 'xtrail_select_action_header_meta', 'xtrail_core_set_open_graph_meta' );
}

/* Function for adding custom meta boxes hooked to default action */
if ( class_exists( 'WP_Block_Type' ) && defined( 'SELECT_ROOT' ) ) {
	add_action( 'admin_head', 'xtrail_select_meta_box_add' );
} else {
	add_action( 'add_meta_boxes', 'xtrail_select_meta_box_add' );
}

if ( ! function_exists( 'xtrail_select_create_meta_box_handler' ) ) {
	function xtrail_select_create_meta_box_handler( $box, $key, $screen ) {
		add_meta_box(
			'qodef-meta-box-' . $key,
			$box->title,
			'xtrail_select_render_meta_box',
			$screen,
			'advanced',
			'high',
			array( 'box' => $box )
		);
	}
}

if (!function_exists('xtrail_core_is_booked_calendar_installed')) {
	/**
	 * Function that checks if Booked plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function xtrail_core_is_booked_calendar_installed() {
		return defined('BOOKED_VERSION');
	}
}