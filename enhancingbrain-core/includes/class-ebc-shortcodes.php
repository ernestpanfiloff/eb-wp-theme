<?php
/**
 * Shortcodes module.
 *
 * @package enhancingbrain-core
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'EBC_Shortcodes' ) ) :
class EBC_Shortcodes {
	/**
	 * Register plugin shortcodes.
	 */
	public static function register() {
		add_shortcode( 'eb_disclaimer', [ __CLASS__, 'disclaimer' ] );
		add_shortcode( 'eb_callout', [ __CLASS__, 'callout' ] );
	}

	/**
	 * Disclaimer block shortcode.
	 */
	public static function disclaimer( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'text' => '',
			],
			(array) $atts,
			'eb_disclaimer'
		);

		$text = trim( (string) $atts['text'] );
		if ( $text === '' ) {
			$text = __( 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.', 'enhancingbrain-core' );
		}

		// Allow enclosed content to override the text attribute.
		if ( is_string( $content ) && trim( $content ) !== '' ) {
			$text = trim( wp_strip_all_tags( $content ) );
		}

		return '<aside class="eb-disclaimer ebc-disclaimer" role="note"><p>' . esc_html( $text ) . '</p></aside>';
	}

	/**
	 * Generic callout shortcode.
	 */
	public static function callout( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'title' => __( 'Note', 'enhancingbrain-core' ),
			],
			(array) $atts,
			'eb_callout'
		);

		$body = is_string( $content ) ? trim( $content ) : '';
		if ( $body === '' ) {
			return '';
		}

		return sprintf(
			'<aside class="ebc-note" role="note"><strong>%s</strong><p>%s</p></aside>',
			esc_html( (string) $atts['title'] ),
			esc_html( wp_strip_all_tags( $body ) )
		);
	}
}
endif;
