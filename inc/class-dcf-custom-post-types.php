<?php

class DcfCustomPostType {

	public static function register_custom_post_types() {
		DcfCustomPostType::register_keynote();
		DcfCustomPostType::register_video();
		DcfCustomPostType::register_photo();
		DcfCustomPostType::register_webinar();
		DcfCustomPostType::register_smart_start();
	}

	public static function register_keynote() {
		add_action( 'init', function () {
			register_post_type( 'keynote', array(
				'labels'                => array(
					'name'               => __( 'Keynotes', 'YOUR-TEXTDOMAIN' ),
					'singular_name'      => __( 'Keynote', 'YOUR-TEXTDOMAIN' ),
					'all_items'          => __( 'All Keynotes', 'YOUR-TEXTDOMAIN' ),
					'new_item'           => __( 'New keynote', 'YOUR-TEXTDOMAIN' ),
					'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'       => __( 'Add New keynote', 'YOUR-TEXTDOMAIN' ),
					'edit_item'          => __( 'Edit keynote', 'YOUR-TEXTDOMAIN' ),
					'view_item'          => __( 'View keynote', 'YOUR-TEXTDOMAIN' ),
					'search_items'       => __( 'Search keynotes', 'YOUR-TEXTDOMAIN' ),
					'not_found'          => __( 'No keynotes found', 'YOUR-TEXTDOMAIN' ),
					'not_found_in_trash' => __( 'No keynotes found in trash', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'  => __( 'Parent keynote', 'YOUR-TEXTDOMAIN' ),
					'menu_name'          => __( 'Keynotes', 'YOUR-TEXTDOMAIN' ),
				),
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'has_archive'           => true,
				'rewrite'               => true,
				'query_var'             => true,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_base'             => 'keynote',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			) );

		} );

		add_filter( 'post_updated_messages', function ( $messages ) {
			global $post;

			$permalink = get_permalink( $post );

			$messages['keynote'] = array(
				0  => '', // Unused. Messages start at index 1.
				1  => sprintf( __( 'Keynote updated. <a target="_blank" href="%s">View keynote</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
				3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
				4  => __( 'Keynote updated.', 'YOUR-TEXTDOMAIN' ),
				/* translators: %s: date and time of the revision */
				5  => isset( $_GET['revision'] ) ? sprintf( __( 'Keynote restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6  => sprintf( __( 'Keynote published. <a href="%s">View keynote</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				7  => __( 'Keynote saved.', 'YOUR-TEXTDOMAIN' ),
				8  => sprintf( __( 'Keynote submitted. <a target="_blank" href="%s">Preview keynote</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
				9  => sprintf( __( 'Keynote scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview keynote</a>', 'YOUR-TEXTDOMAIN' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
				10 => sprintf( __( 'Keynote draft updated. <a target="_blank" href="%s">Preview keynote</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			);

			return $messages;
		} );
	}

	private static function register_video() {
		add_action( 'init', function () {
			register_post_type( 'video', array(
				'labels'                => array(
					'name'               => __( 'Videos', 'YOUR-TEXTDOMAIN' ),
					'singular_name'      => __( 'Video', 'YOUR-TEXTDOMAIN' ),
					'all_items'          => __( 'All Videos', 'YOUR-TEXTDOMAIN' ),
					'new_item'           => __( 'New video', 'YOUR-TEXTDOMAIN' ),
					'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'       => __( 'Add New video', 'YOUR-TEXTDOMAIN' ),
					'edit_item'          => __( 'Edit video', 'YOUR-TEXTDOMAIN' ),
					'view_item'          => __( 'View video', 'YOUR-TEXTDOMAIN' ),
					'search_items'       => __( 'Search videos', 'YOUR-TEXTDOMAIN' ),
					'not_found'          => __( 'No videos found', 'YOUR-TEXTDOMAIN' ),
					'not_found_in_trash' => __( 'No videos found in trash', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'  => __( 'Parent video', 'YOUR-TEXTDOMAIN' ),
					'menu_name'          => __( 'Videos', 'YOUR-TEXTDOMAIN' ),
				),
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'has_archive'           => true,
				'rewrite'               => true,
				'query_var'             => true,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_base'             => 'video',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			) );

		} );


		add_filter( 'post_updated_messages', function ( $messages ) {
			global $post;

			$permalink = get_permalink( $post );

			$messages['video'] = array(
				0  => '', // Unused. Messages start at index 1.
				1  => sprintf( __( 'Video updated. <a target="_blank" href="%s">View video</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
				3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
				4  => __( 'Video updated.', 'YOUR-TEXTDOMAIN' ),
				/* translators: %s: date and time of the revision */
				5  => isset( $_GET['revision'] ) ? sprintf( __( 'Video restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6  => sprintf( __( 'Video published. <a href="%s">View video</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				7  => __( 'Video saved.', 'YOUR-TEXTDOMAIN' ),
				8  => sprintf( __( 'Video submitted. <a target="_blank" href="%s">Preview video</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
				9  => sprintf( __( 'Video scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview video</a>', 'YOUR-TEXTDOMAIN' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
				10 => sprintf( __( 'Video draft updated. <a target="_blank" href="%s">Preview video</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			);

			return $messages;
		} );
	}

	private static function register_photo() {

		add_action( 'init', function () {
			register_post_type( 'photo', array(
				'labels'                => array(
					'name'               => __( 'Photos', 'YOUR-TEXTDOMAIN' ),
					'singular_name'      => __( 'Photo', 'YOUR-TEXTDOMAIN' ),
					'all_items'          => __( 'All Photos', 'YOUR-TEXTDOMAIN' ),
					'new_item'           => __( 'New photo', 'YOUR-TEXTDOMAIN' ),
					'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'       => __( 'Add New photo', 'YOUR-TEXTDOMAIN' ),
					'edit_item'          => __( 'Edit photo', 'YOUR-TEXTDOMAIN' ),
					'view_item'          => __( 'View photo', 'YOUR-TEXTDOMAIN' ),
					'search_items'       => __( 'Search photos', 'YOUR-TEXTDOMAIN' ),
					'not_found'          => __( 'No photos found', 'YOUR-TEXTDOMAIN' ),
					'not_found_in_trash' => __( 'No photos found in trash', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'  => __( 'Parent photo', 'YOUR-TEXTDOMAIN' ),
					'menu_name'          => __( 'Photos', 'YOUR-TEXTDOMAIN' ),
				),
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => array( 'title', 'thumbnail' ),
				'has_archive'           => true,
				'rewrite'               => true,
				'query_var'             => true,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_base'             => 'photo',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			) );

		} );

		add_filter( 'post_updated_messages', function ( $messages ) {
			global $post;

			$permalink = get_permalink( $post );

			$messages['photo'] = array(
				0  => '', // Unused. Messages start at index 1.
				1  => sprintf( __( 'Photo updated. <a target="_blank" href="%s">View photo</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
				3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
				4  => __( 'Photo updated.', 'YOUR-TEXTDOMAIN' ),
				/* translators: %s: date and time of the revision */
				5  => isset( $_GET['revision'] ) ? sprintf( __( 'Photo restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6  => sprintf( __( 'Photo published. <a href="%s">View photo</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				7  => __( 'Photo saved.', 'YOUR-TEXTDOMAIN' ),
				8  => sprintf( __( 'Photo submitted. <a target="_blank" href="%s">Preview photo</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
				9  => sprintf( __( 'Photo scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview photo</a>', 'YOUR-TEXTDOMAIN' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
				10 => sprintf( __( 'Photo draft updated. <a target="_blank" href="%s">Preview photo</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			);

			return $messages;
		} );
	}

	private static function register_webinar() {
		add_action( 'init', function () {
			register_post_type( 'webinar', array(
				'labels'                => array(
					'name'               => __( 'Webinars', 'YOUR-TEXTDOMAIN' ),
					'singular_name'      => __( 'Webinar', 'YOUR-TEXTDOMAIN' ),
					'all_items'          => __( 'All Webinars', 'YOUR-TEXTDOMAIN' ),
					'new_item'           => __( 'New webinar', 'YOUR-TEXTDOMAIN' ),
					'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'       => __( 'Add New webinar', 'YOUR-TEXTDOMAIN' ),
					'edit_item'          => __( 'Edit webinar', 'YOUR-TEXTDOMAIN' ),
					'view_item'          => __( 'View webinar', 'YOUR-TEXTDOMAIN' ),
					'search_items'       => __( 'Search webinars', 'YOUR-TEXTDOMAIN' ),
					'not_found'          => __( 'No webinars found', 'YOUR-TEXTDOMAIN' ),
					'not_found_in_trash' => __( 'No webinars found in trash', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'  => __( 'Parent webinar', 'YOUR-TEXTDOMAIN' ),
					'menu_name'          => __( 'Webinars', 'YOUR-TEXTDOMAIN' ),
				),
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'has_archive'           => true,
				'rewrite'               => true,
				'query_var'             => true,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_base'             => 'webinar',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			) );

		} );


		add_filter( 'post_updated_messages', function ( $messages ) {
			global $post;

			$permalink = get_permalink( $post );

			$messages['webinar'] = array(
				0  => '', // Unused. Messages start at index 1.
				1  => sprintf( __( 'Webinar updated. <a target="_blank" href="%s">View webinar</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
				3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
				4  => __( 'Webinar updated.', 'YOUR-TEXTDOMAIN' ),
				/* translators: %s: date and time of the revision */
				5  => isset( $_GET['revision'] ) ? sprintf( __( 'Webinar restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6  => sprintf( __( 'Webinar published. <a href="%s">View webinar</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				7  => __( 'Webinar saved.', 'YOUR-TEXTDOMAIN' ),
				8  => sprintf( __( 'Webinar submitted. <a target="_blank" href="%s">Preview webinar</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
				9  => sprintf( __( 'Webinar scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview webinar</a>', 'YOUR-TEXTDOMAIN' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
				10 => sprintf( __( 'Webinar draft updated. <a target="_blank" href="%s">Preview webinar</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			);

			return $messages;
		} );
	}

	private static function register_smart_start() {

		add_action( 'init', function () {
			register_post_type( 'smart-start', array(
				'labels'                => array(
					'name'               => __( 'Smart starts', 'YOUR-TEXTDOMAIN' ),
					'singular_name'      => __( 'Smart start', 'YOUR-TEXTDOMAIN' ),
					'all_items'          => __( 'All Smart starts', 'YOUR-TEXTDOMAIN' ),
					'new_item'           => __( 'New smart start', 'YOUR-TEXTDOMAIN' ),
					'add_new'            => __( 'Add New', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'       => __( 'Add New smart start', 'YOUR-TEXTDOMAIN' ),
					'edit_item'          => __( 'Edit smart start', 'YOUR-TEXTDOMAIN' ),
					'view_item'          => __( 'View smart start', 'YOUR-TEXTDOMAIN' ),
					'search_items'       => __( 'Search smart starts', 'YOUR-TEXTDOMAIN' ),
					'not_found'          => __( 'No smart starts found', 'YOUR-TEXTDOMAIN' ),
					'not_found_in_trash' => __( 'No smart starts found in trash', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'  => __( 'Parent smart start', 'YOUR-TEXTDOMAIN' ),
					'menu_name'          => __( 'Smart starts', 'YOUR-TEXTDOMAIN' ),
				),
				'public'                => true,
				'hierarchical'          => false,
				'show_ui'               => true,
				'show_in_nav_menus'     => true,
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'has_archive'           => true,
				'rewrite'               => true,
				'query_var'             => true,
				'menu_icon'             => 'dashicons-admin-post',
				'show_in_rest'          => true,
				'rest_base'             => 'smart-start',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
			) );

		} );


		add_filter( 'post_updated_messages', function ( $messages ) {
			global $post;

			$permalink = get_permalink( $post );

			$messages['smart-start'] = array(
				0  => '', // Unused. Messages start at index 1.
				1  => sprintf( __( 'Smart start updated. <a target="_blank" href="%s">View smart start</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				2  => __( 'Custom field updated.', 'YOUR-TEXTDOMAIN' ),
				3  => __( 'Custom field deleted.', 'YOUR-TEXTDOMAIN' ),
				4  => __( 'Smart start updated.', 'YOUR-TEXTDOMAIN' ),
				/* translators: %s: date and time of the revision */
				5  => isset( $_GET['revision'] ) ? sprintf( __( 'Smart start restored to revision from %s', 'YOUR-TEXTDOMAIN' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
				6  => sprintf( __( 'Smart start published. <a href="%s">View smart start</a>', 'YOUR-TEXTDOMAIN' ), esc_url( $permalink ) ),
				7  => __( 'Smart start saved.', 'YOUR-TEXTDOMAIN' ),
				8  => sprintf( __( 'Smart start submitted. <a target="_blank" href="%s">Preview smart start</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
				9  => sprintf( __( 'Smart start scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview smart start</a>', 'YOUR-TEXTDOMAIN' ),
					// translators: Publish box date format, see http://php.net/date
					date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
				10 => sprintf( __( 'Smart start draft updated. <a target="_blank" href="%s">Preview smart start</a>', 'YOUR-TEXTDOMAIN' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
			);

			return $messages;
		} );
	}
}