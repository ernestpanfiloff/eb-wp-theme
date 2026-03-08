<?php
/**
 * 404 template
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="archive-page">
	<div class="wrap">
		<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'enhancingbrain' ); ?>">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'enhancingbrain' ); ?></a></li>
				<li aria-hidden="true">></li>
				<li aria-current="page"><?php esc_html_e( '404', 'enhancingbrain' ); ?></li>
			</ol>
		</nav>

		<header class="archive-header">
			<div class="sh">
				<div class="sh-left">
					<span class="sh-ey" aria-hidden="true"><?php esc_html_e( 'Page Not Found', 'enhancingbrain' ); ?></span>
					<h1 class="sh-t"><?php esc_html_e( '404 — This page does not exist', 'enhancingbrain' ); ?></h1>
				</div>
			</div>
		</header>

		<div class="no-posts">
			<p>
				<?php esc_html_e( 'The URL may be incorrect, or the page may have been moved.', 'enhancingbrain' ); ?>
			</p>
			<div style="display:flex;gap:.75rem;justify-content:center;flex-wrap:wrap;margin-top:1rem;">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="f-btn" style="display:inline-block;max-width:220px;text-decoration:none;">
					<?php esc_html_e( '← Back to Home', 'enhancingbrain' ); ?>
				</a>
				<a href="<?php echo esc_url( home_url( '/articles' ) ); ?>" class="band-tag" style="display:inline-flex;align-items:center;">
					<?php esc_html_e( 'Browse Articles', 'enhancingbrain' ); ?>
				</a>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>

