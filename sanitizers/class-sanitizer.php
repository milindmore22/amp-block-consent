<?php
/**
 * Sanitizer
 *
 * @package Google\AMP_Block_Consent
 */

namespace Google\AMP_Block_Consent;

use AMP_Base_Sanitizer;
use DOMElement;
use DOMXPath;
use DOMNodeList;

/**
 * Class Sanitizer
 */
class Sanitizer extends AMP_Base_Sanitizer {

	/**
	 * Sanitize.
	 */
	public function sanitize() {
		$xpath = new DOMXPath( $this->dom );

		// Get all Instagram Embeds.
		$amp_instagrams = $xpath->query( '//amp-instagram' );
		$amp_youtubes = $xpath->query( '//amp-youtube' );

		// Insta.
		if ( $amp_instagrams instanceof DOMNodeList ) {
			// Loop thourgh all instgarm embeds on page.
			foreach ( $amp_instagrams as $amp_instagram ) {
				if ( $amp_instagram instanceof DOMElement ) {
					// Add Attribute.
					$amp_instagram->setAttribute( 'data-block-on-consent', '' );
				}
			}
		}

		// Youtube.
		if ( $amp_youtubes instanceof DOMNodeList ) {
			foreach ( $amp_youtubes as $amp_youtube ) {
				if ( $amp_youtube instanceof DOMElement ) {
					$amp_youtube->setAttribute( 'data-block-on-consent', '' );
				}
			}
		}

	}

}
