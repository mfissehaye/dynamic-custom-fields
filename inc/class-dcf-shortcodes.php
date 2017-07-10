<?php

class DcfShortcodes {
	public static function registerShortCodes() {
		function show_webinar( $atts ) {

			// Attributes
			$atts = shortcode_atts(
				array(
					'count' => '3',
				),
				$atts
			);

			$webinars = get_posts([
				'post_type' => 'webinar',
				'numberposts' => $atts['count']
			]);
			ob_start();
			foreach($webinars as $post) {
				require(__DIR__ . '/../views/post-webinar-template.php');
			}
			$output = ob_get_contents();
			ob_end_clean();

			return $output;

		}
		add_shortcode( 'show-webinars', 'show_webinar' );
	}
}