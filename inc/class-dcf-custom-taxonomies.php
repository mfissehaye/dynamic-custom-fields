<?php

class DcfCustomTaxonomies {

	const CLIENT_CATEGORY = 'client-category';
	const STARTERS_CATEGORY = 'starters-category';

	public static function register_custom_taxonomies() {
		DcfCustomTaxonomies::register_custom_taxonomy_client_category();
		DcfCustomTaxonomies::register_custom_taxonomy_smart_start();
	}

	private static function register_custom_taxonomy_client_category() {
		add_action( 'init', function () {
			register_taxonomy( self::CLIENT_CATEGORY, array( 'client' ), array(
				'hierarchical'          => true,
				'public'                => true,
				'show_in_nav_menus'     => true,
				'show_ui'               => true,
				'show_admin_column'     => true,
				'query_var'             => true,
				'rewrite'               => true,
				'capabilities'          => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'edit_posts'
				),
				'labels'                => array(
					'name'                       => __( 'Client categories', 'YOUR-TEXTDOMAIN' ),
					'singular_name'              => _x( 'Client category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
					'search_items'               => __( 'Search Client categories', 'YOUR-TEXTDOMAIN' ),
					'popular_items'              => __( 'Popular Client categories', 'YOUR-TEXTDOMAIN' ),
					'all_items'                  => __( 'All Client categories', 'YOUR-TEXTDOMAIN' ),
					'parent_item'                => __( 'Parent Client category', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'          => __( 'Parent Client category:', 'YOUR-TEXTDOMAIN' ),
					'edit_item'                  => __( 'Edit Client category', 'YOUR-TEXTDOMAIN' ),
					'update_item'                => __( 'Update Client category', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'               => __( 'New Client category', 'YOUR-TEXTDOMAIN' ),
					'new_item_name'              => __( 'New Client category', 'YOUR-TEXTDOMAIN' ),
					'separate_items_with_commas' => __( 'Separate Client categories with commas', 'YOUR-TEXTDOMAIN' ),
					'add_or_remove_items'        => __( 'Add or remove Client categories', 'YOUR-TEXTDOMAIN' ),
					'choose_from_most_used'      => __( 'Choose from the most used Client categories', 'YOUR-TEXTDOMAIN' ),
					'not_found'                  => __( 'No Client categories found.', 'YOUR-TEXTDOMAIN' ),
					'menu_name'                  => __( 'Client categories', 'YOUR-TEXTDOMAIN' ),
				),
				'show_in_rest'          => true,
				'rest_base'             => 'client-category',
				'rest_controller_class' => 'WP_REST_Terms_Controller',
			) );

		} );
	}

	private static function register_custom_taxonomy_smart_start() {
		add_action( 'init', function () {
			register_taxonomy( self::STARTERS_CATEGORY, array( DcfCustomPostType::POST_TYPE_SMART_START ), array(
				'hierarchical'          => true,
				'public'                => true,
				'show_in_nav_menus'     => true,
				'show_ui'               => true,
				'show_admin_column'     => true,
				'query_var'             => true,
				'rewrite'               => true,
				'capabilities'          => array(
					'manage_terms' => 'edit_posts',
					'edit_terms'   => 'edit_posts',
					'delete_terms' => 'edit_posts',
					'assign_terms' => 'edit_posts'
				),
				'labels'                => array(
					'name'                       => __( 'Starters categories', 'YOUR-TEXTDOMAIN' ),
					'singular_name'              => _x( 'Starters category', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
					'search_items'               => __( 'Search starters categories', 'YOUR-TEXTDOMAIN' ),
					'popular_items'              => __( 'Popular starters categories', 'YOUR-TEXTDOMAIN' ),
					'all_items'                  => __( 'All starters categories', 'YOUR-TEXTDOMAIN' ),
					'parent_item'                => __( 'Parent starters category', 'YOUR-TEXTDOMAIN' ),
					'parent_item_colon'          => __( 'Parent starters category:', 'YOUR-TEXTDOMAIN' ),
					'edit_item'                  => __( 'Edit starters category', 'YOUR-TEXTDOMAIN' ),
					'update_item'                => __( 'Update starters category', 'YOUR-TEXTDOMAIN' ),
					'add_new_item'               => __( 'New starters category', 'YOUR-TEXTDOMAIN' ),
					'new_item_name'              => __( 'New starters category', 'YOUR-TEXTDOMAIN' ),
					'separate_items_with_commas' => __( 'Separate starters categories with commas', 'YOUR-TEXTDOMAIN' ),
					'add_or_remove_items'        => __( 'Add or remove starters categories', 'YOUR-TEXTDOMAIN' ),
					'choose_from_most_used'      => __( 'Choose from the most used starters categories', 'YOUR-TEXTDOMAIN' ),
					'not_found'                  => __( 'No starters categories found.', 'YOUR-TEXTDOMAIN' ),
					'menu_name'                  => __( 'Starters categories', 'YOUR-TEXTDOMAIN' ),
				),
				'show_in_rest'          => true,
				'rest_base'             => self::STARTERS_CATEGORY,
				'rest_controller_class' => 'WP_REST_Terms_Controller',
			) );
		} );
	}
}