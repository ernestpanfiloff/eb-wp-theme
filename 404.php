<?php
/**
 * 404 template
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="archive-page eb-404">
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
					<h1 id="not-found-title" class="sh-t"><?php esc_html_e( '404 — this page does not exist', 'enhancingbrain' ); ?></h1>
				</div>
			</div>
		</header>

		<div class="no-posts">
			<p><?php esc_html_e( 'The page may have moved, the link may be outdated, or the URL may have a typo.', 'enhancingbrain' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-cta" style="display:inline-flex;max-width:220px;margin-top:1rem;text-decoration:none;">
				<?php esc_html_e( '← Back to Home', 'enhancingbrain' ); ?>
			</a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
