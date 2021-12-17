<?php
/**
 * AMP plugin name compatibility plugin bootstrap.
 *
 * @package   Google\AMP_Block_Consent
 * @author    milindmore22, Google
 * @license   GPL-2.0-or-later
 * @copyright 2020 Google Inc.
 *
 * @wordpress-plugin
 * Plugin Name: AMP Block consent
 * Plugin URI: https://wpindia.co.in/
 * Description: Plugin to add attribute to embeds.
 * Version: 0.1
 * Author: milindmore22, Google
 * Author URI: https://wpindia.co.in/
 * License: GNU General Public License v2 (or later)
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Google\AMP_Block_Consent;

/**
 * Add sanitizers to convert non-AMP functions to AMP components.
 *
 * @see https://amp-wp.org/reference/hook/amp_content_sanitizers/
 */
add_filter( 'amp_content_sanitizers', __NAMESPACE__ . '\filter_sanitizers' );

/**
 * Add sanitizer to fix up the markup.
 *
 * @param array $sanitizers Sanitizers.
 * @return array Sanitizers.
 */
function filter_sanitizers( $sanitizers ) {
	require_once __DIR__ . '/sanitizers/class-sanitizer.php';
	$sanitizers[ __NAMESPACE__ . '\Sanitizer' ] = array();
	return $sanitizers;
}
