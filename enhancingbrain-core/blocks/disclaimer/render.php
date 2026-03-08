<?php
/**
 * Server-side render callback for disclaimer block.
 *
 * @package enhancingbrain-core
 *
 * @var array  $attributes Block attributes.
 * @var string $content    Block content (unused).
 */

defined( 'ABSPATH' ) || exit;

$default = __( 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.', 'enhancingbrain-core' );
$text    = isset( $attributes['text'] ) ? (string) $attributes['text'] : $default;
$text    = trim( wp_strip_all_tags( $text ) );
if ( $text === '' ) {
	$text = $default;
}
?>
<aside class="eb-disclaimer ebc-disclaimer" role="note">
	<p><?php echo esc_html( $text ); ?></p>
</aside>

