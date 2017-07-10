<?php

/**
 * Plugin Name:     Dynamic Custom Fields
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     custom-fields
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Custom_Fields
 */

require_once 'inc/class-dcf-custom-post-types.php';
require_once 'inc/class-dcf-custom-fields.php';
require_once 'inc/class-dcf-custom-taxonomies.php';
require_once 'inc/class-dcf-shortcodes.php';

class CustomFields {
	public function __construct() {
		DcfCustomPostType::register_custom_post_types();
		DcfCustomFields::register_custom_fields();
		DcfCustomTaxonomies::register_custom_taxonomies();
		DcfShortcodes::registerShortCodes();
	}
}

new CustomFields;