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

		<section class="card" aria-labelledby="not-found-title" style="max-width:760px;margin:1.25rem auto 0;">
			<div class="c-body" style="padding:2rem;">
				<span class="hero-eyebrow" aria-hidden="true" style="margin-bottom:1rem;"><?php esc_html_e( 'Page Not Found', 'enhancingbrain' ); ?></span>
				<h1 id="not-found-title" class="single-title" style="margin-bottom:.75rem;"><?php esc_html_e( '404: this page does not exist', 'enhancingbrain' ); ?></h1>
				<p class="hero-p" style="max-width:none;margin-bottom:1.25rem;">
					<?php esc_html_e( 'The page may have moved, the link may be outdated, or the URL may have a typo.', 'enhancingbrain' ); ?>
				</p>

				<div class="hero-pills" aria-label="<?php esc_attr_e( 'Helpful links', 'enhancingbrain' ); ?>" style="margin-bottom:1.5rem;">
					<span class="hero-pill"><?php esc_html_e( 'Science-backed', 'enhancingbrain' ); ?></span>
					<span class="hero-pill"><?php esc_html_e( 'No hype', 'enhancingbrain' ); ?></span>
					<span class="hero-pill"><?php esc_html_e( 'Fast reads', 'enhancingbrain' ); ?></span>
				</div>

				<div class="sg-row" style="display:flex;gap:.75rem;flex-wrap:wrap;align-items:center;">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-cta">
						<?php esc_html_e( 'Back to Home', 'enhancingbrain' ); ?>
					</a>
					<a href="<?php echo esc_url( home_url( '/articles' ) ); ?>" class="lm-btn">
						<?php esc_html_e( 'Browse Articles', 'enhancingbrain' ); ?>
					</a>
				</div>
			</div>
		</section>
	</div>
</main>

<?php get_footer(); ?>

