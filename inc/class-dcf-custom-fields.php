<?php

class DcfCustomFields {

	public static function register_custom_fields() {
		DcfCustomFields::register_video_custom_fields();
	}

	private static function register_video_custom_fields() {
		add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
			$prefix = 'dcf-';

			$meta_boxes[] = array(
				'id'         => 'youtube_embed_code',
				'title'      => esc_html__( 'Video Options', 'dcf' ),
				'context'    => 'advanced',
				'priority'   => 'default',
				'post_types' => array( 'video' ),
				'autosave'   => false,
				'fields'     => array(
					array(
						'id'   => $prefix . 'youtube_embed_code',
						'type' => 'textarea',
						'name' => esc_html__( 'Youtube Embed Code', 'dcf' ),
					),
					array(
						'id'   => $prefix . 'show_in_about_page',
						'name' => esc_html__( 'Show in About Page', 'dcf' ),
						'type' => 'checkbox',
						'desc' => esc_html__( 'Show this video in about page template', 'dcf' ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'clients',
				'title'      => esc_html__( 'More Options', 'dcf' ),
				'context'    => 'advanced',
				'priority'   => 'default',
				'post_types' => array( 'client' ),
				'autosave'   => false,
				'fields'     => array(
					array(
						'id'   => $prefix . 'client_featured',
						'name' => esc_html__( 'Feature this client', 'dcf' ),
						'type' => 'checkbox',
						'desc' => esc_html__( 'Featured clients show at the top of the clients page', 'dcf' ),
					),
					array(
						'id'   => $prefix . 'external_link',
						'name' => esc_html__( 'External Link', 'dcf' ),
						'type' => 'text',
						'desc' => esc_html__( 'External link to the client', 'dcf' ),
					),
					array(
						'id'   => $prefix . 'modal_client_testimony',
						'name' => esc_html__( 'Modal Client Testimony', 'dcf' ),
						'type' => 'textarea',
						'desc' => esc_html__( 'Enter the modal client desccription', 'dcf' ),
					),
					array(
						'id'   => $prefix . 'modal_client_author',
						'name' => esc_html__( 'Modal Client Author', 'dcf' ),
						'type' => 'text',
						'desc' => esc_html__( 'Enter the modal client author', 'dcf' ),
					),
					array(
						'id'   => $prefix . 'modal_client_position',
						'name' => esc_html__( 'Modal Client Position', 'dcf' ),
						'type' => 'text',
						'desc' => esc_html__( 'Enter the modal client position', 'dcf' ),
					)
				),
			);

			$meta_boxes[] = array(
				'id'         => 'zone_experience_attributes',
				'title'      => esc_html__( 'More Zone Experience Options', 'dcf' ),
				'context'    => 'advanced',
				'priority'   => 'default',
				'post_types' => array( 'zone-experience' ),
				'autosave'   => false,
				'fields'     => array(
					array(
						'id'   => $prefix . 'zone_experience_icon',
						'type' => 'image_advanced',
						'name' => esc_html__( 'Zone Experience Icon', 'dcf' ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'page_attributes',
				'title'      => esc_html__( 'Page Attributes', 'dcf' ),
				'context'    => 'advanced',
				'priority'   => 'default',
				'post_types' => array( 'page' ),
				'autosave'   => false,
				'fields'     => array(
					array(
						'id'   => $prefix . 'page_subtitle',
						'type' => 'text',
						'name' => esc_html__( 'Page Subtitle', 'dcf' ),
					)
				),
			);

			$meta_boxes[] = array(
				'id'         => 'testimonial_attributes',
				'title'      => esc_html__( 'Testimonial Attributes', 'dcf' ),
				'context'    => 'advanced',
				'priority'   => 'default',
				'post_types' => array( 'testimony', 'keynote-testimony' ),
				'fields'     => array(
					array(
						'id'   => $prefix . 'testimony',
						'type' => 'textarea',
						'name' => esc_html__( 'The Testimony', 'dcf' )
					),
					array(
						'id'   => $prefix . 'author',
						'type' => 'text',
						'name' => esc_html__( 'The author of the testimony', 'dcf' )
					),
					array(
						'id'   => $prefix . 'author-position',
						'type' => 'text',
						'name' => esc_html__( 'The position of the author', 'dcf' )
					)
				)
			);

			return $meta_boxes;
		} );
	}


}