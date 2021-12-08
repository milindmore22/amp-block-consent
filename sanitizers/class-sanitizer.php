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

		// Set up mobile nav menu.
		$amp_instagrams = $xpath->query( '//amp-instagram' );

		if ( $amp_instagrams instanceof DOMNodeList ) {
			foreach ( $amp_instagrams as $amp_instagram ) {
				if ( $amp_instagram instanceof DOMElement ) {
					$amp_instagram->setAttribute( 'data-block-on-consent', '' );
				}
			}
		}

	}

}
