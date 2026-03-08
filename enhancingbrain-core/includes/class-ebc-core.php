<?php
/**
 * Core bootstrap.
 *
 * @package enhancingbrain-core
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'EBC_Core' ) ) :
class EBC_Core {
	/**
	 * Boot plugin modules.
	 */
	public static function boot() {
		require_once EBC_DIR . 'includes/class-ebc-shortcodes.php';
		require_once EBC_DIR . 'includes/class-ebc-blocks.php';

		add_action( 'init', [ 'EBC_Shortcodes', 'register' ] );
		add_action( 'init', [ 'EBC_Blocks', 'register' ] );
		add_action( 'enqueue_block_assets', [ __CLASS__, 'enqueue_shared_assets' ] );
	}

	/**
	 * Shared front/editor styles for plugin blocks and shortcodes.
	 */
	public static function enqueue_shared_assets() {
		wp_enqueue_style(
			'ebc-shared',
			EBC_URL . 'assets/css/ebc-shared.css',
			[],
			EBC_VERSION
		);
	}
}
endif;
