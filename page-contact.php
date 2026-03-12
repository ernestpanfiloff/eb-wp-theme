<?php
/**
 * Contact page template.
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="contact-page">
	<?php while ( have_posts() ) : the_post(); ?>

	<section class="contact-hero">
		<div class="wrap">
			<span class="contact-kicker"><?php esc_html_e( 'Get in touch', 'enhancingbrain' ); ?></span>
			<h1 class="contact-title"><?php esc_html_e( "We'd love to hear from you.", 'enhancingbrain' ); ?></h1>
			<p class="contact-sub"><?php esc_html_e( 'Questions, collaborations, or just want to say hi, reach out any time.', 'enhancingbrain' ); ?></p>
		</div>
	</section>

	<section class="contact-main">
		<div class="wrap contact-grid">
			<aside class="contact-info">
				<div>
					<span class="contact-label"><?php esc_html_e( 'Contact', 'enhancingbrain' ); ?></span>
					<h2 class="contact-heading"><?php esc_html_e( "Let's connect", 'enhancingbrain' ); ?></h2>
					<p class="contact-text"><?php esc_html_e( 'Pick the channel that works best for you. For quick back-and-forth, Instagram DMs tend to be the fastest. For detailed questions or partnership inquiries, email is best.', 'enhancingbrain' ); ?></p>
				</div>

				<div class="method-card">
					<div class="method-icon" aria-hidden="true">
						<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" focusable="false">
							<rect x="2" y="4" width="20" height="16" rx="2"></rect>
							<polyline points="2,4 12,14 22,4"></polyline>
						</svg>
					</div>
					<div class="method-body">
						<span class="method-label"><?php esc_html_e( 'Email', 'enhancingbrain' ); ?></span>
						<div class="method-title"><?php esc_html_e( 'Drop us an email', 'enhancingbrain' ); ?></div>
						<p class="method-desc"><?php esc_html_e( 'Best for collaboration requests, partnerships, detailed questions, or anything that needs a thorough reply.', 'enhancingbrain' ); ?></p>
						<div class="method-email-block" data-email-reveal>
							<a href="#" class="method-link method-email-link method-obfuscated" data-email-link rel="nofollow"><?php esc_html_e( 'e•••••@••••••••••••.com', 'enhancingbrain' ); ?></a>
							<button type="button" class="email-reveal-btn" data-reveal-email aria-expanded="false"><?php esc_html_e( 'Reveal email', 'enhancingbrain' ); ?></button>
						</div>
					</div>
				</div>

				<div class="method-card">
					<div class="method-icon" aria-hidden="true">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" focusable="false">
							<rect x="2.5" y="2.5" width="19" height="19" rx="5"></rect>
							<circle cx="12" cy="12" r="4.2"></circle>
							<circle cx="18" cy="6" r="1" fill="currentColor" stroke="none"></circle>
						</svg>
					</div>
					<div class="method-body">
						<span class="method-label"><?php esc_html_e( 'Instagram', 'enhancingbrain' ); ?></span>
						<div class="method-title"><?php esc_html_e( 'DM us on Instagram', 'enhancingbrain' ); ?></div>
						<p class="method-desc"><?php esc_html_e( 'For quick questions, content suggestions, or just to say hi. We read every message.', 'enhancingbrain' ); ?></p>
						<a href="https://instagram.com/enhancingbrain" target="_blank" rel="noopener noreferrer" class="method-link">@enhancingbrain</a>
					</div>
				</div>

				<div class="resp-note">
					<svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
					<p><strong><?php esc_html_e( 'Typical response time:', 'enhancingbrain' ); ?></strong> <?php esc_html_e( '1 to 3 business days for email. Instagram DMs are usually faster.', 'enhancingbrain' ); ?></p>
				</div>
			</aside>

		</div>
	</section>

	<section class="contact-faq">
		<div class="wrap">
			<span class="contact-label"><?php esc_html_e( 'Common questions', 'enhancingbrain' ); ?></span>
			<h2 class="contact-faq-title"><?php esc_html_e( 'Before you reach out', 'enhancingbrain' ); ?></h2>
			<div class="contact-faq-grid">
				<article class="contact-faq-item">
					<h3><?php esc_html_e( 'Do you offer 1-on-1 coaching?', 'enhancingbrain' ); ?></h3>
					<p><?php esc_html_e( 'Not currently. Enhancing Brain is focused on content, the weekly newsletter, and the community.', 'enhancingbrain' ); ?></p>
				</article>
				<article class="contact-faq-item">
					<h3><?php esc_html_e( 'Can you recommend a supplement for me?', 'enhancingbrain' ); ?></h3>
					<p><?php esc_html_e( "We're not medical professionals. Everything here is educational. Always work with a qualified clinician for personal decisions.", 'enhancingbrain' ); ?></p>
				</article>
				<article class="contact-faq-item">
					<h3><?php esc_html_e( 'Are you open to collaborations?', 'enhancingbrain' ); ?></h3>
					<p><?php esc_html_e( 'Yes, selectively. If your project aligns with science-backed brain health, send us the details.', 'enhancingbrain' ); ?></p>
				</article>
			</div>
		</div>
	</section>

	<?php
	$content = trim( (string) get_the_content() );
	if ( $content !== '' ) :
	?>
	<section class="contact-extra">
		<div class="wrap single-content">
			<?php the_content(); ?>
		</div>
	</section>
	<?php endif; ?>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
