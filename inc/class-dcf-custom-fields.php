<?php

class DcfCustomFields {

	public static function register_custom_fields() {
		DcfCustomFields::register_video_custom_fields();
	}

	private static function register_video_custom_fields() {
		add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {
			$prefix = 'dcf-';

			$meta_boxes[] = array(
				'id'       => 'youtube_embed_code',
				'title'    => esc_html__( 'Video Options', 'dcf' ),
				'context'  => 'advanced',
				'priority' => 'default',
				'post_types' => array('video'),
				'autosave' => false,
				'fields'   => array(
					array(
						'id'   => $prefix . 'youtube_embed_code',
						'type' => 'textarea',
						'name' => esc_html__( 'Youtube Embed Code', 'dcf' ),
					),
					array(
						'id' => $prefix . 'show_in_about_page',
						'name' => esc_html__( 'Show in About Page', 'dcf' ),
						'type' => 'checkbox',
						'desc' => esc_html__( 'Show this video in about page template', 'dcf' ),
					),
				),
			);

			return $meta_boxes;
		} );
	}


}