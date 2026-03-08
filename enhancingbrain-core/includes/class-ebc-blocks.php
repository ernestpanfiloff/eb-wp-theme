<?php
/**
 * Blocks module.
 *
 * @package enhancingbrain-core
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'EBC_Blocks' ) ) :
class EBC_Blocks {
	/**
	 * Register blocks from metadata.
	 */
	public static function register() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}
		$disclaimer = EBC_DIR . 'blocks/disclaimer';
		if ( file_exists( $disclaimer . '/block.json' ) ) {
			register_block_type( $disclaimer );
		}
	}
}
endif;
