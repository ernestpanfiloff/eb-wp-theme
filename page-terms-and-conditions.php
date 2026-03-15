<?php
/**
 * Terms & Conditions page template (slug-based).
 * This file is automatically used for /terms-and-conditions.
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="terms-page disclaimer-page">
	<?php while ( have_posts() ) : the_post(); ?>

	<section class="contact-hero">
		<div class="wrap">
			<span class="contact-kicker"><?php esc_html_e( 'Company & Legal', 'enhancingbrain' ); ?></span>
			<h1 class="contact-title"><?php esc_html_e( 'Terms & Conditions', 'enhancingbrain' ); ?></h1>
			<p class="contact-sub"><?php esc_html_e( 'Last updated: March 2026', 'enhancingbrain' ); ?></p>
		</div>
	</section>

	<section class="disclaimer-main">
		<div class="wrap">
			<article class="single-content disclaimer-content">
				<h2><?php esc_html_e( 'Acceptance of terms', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'By accessing and using Enhancing Brain, you agree to these Terms & Conditions. If you do not agree, please do not use the site.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Educational purpose only', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'All content is provided for informational and educational purposes only. Nothing on this site is medical advice, diagnosis, or treatment. Always consult a qualified healthcare professional before making health-related decisions.', 'enhancingbrain' ); ?></p>

				<aside class="callout callout--note" role="note">
					<p><?php esc_html_e( 'Using this site does not create a doctor-patient or professional advisory relationship.', 'enhancingbrain' ); ?></p>
				</aside>

				<h2><?php esc_html_e( 'Use of website content', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Unless otherwise stated, all text, branding, graphics, and site content are the property of Enhancing Brain and are protected by applicable intellectual property laws.', 'enhancingbrain' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'You may view and share links to public pages for personal, non-commercial use.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'You may not copy, republish, or redistribute substantial portions of content without written permission.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'You may not use site content in a misleading, deceptive, or unlawful way.', 'enhancingbrain' ); ?></li>
				</ul>

				<h2><?php esc_html_e( 'Affiliate disclosure', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Some links on this site may be affiliate links, which means we may earn a commission if you purchase through those links at no extra cost to you. See our', 'enhancingbrain' ); ?> <a href="<?php echo esc_url( home_url( '/affiliate-disclaimer' ) ); ?>"><?php esc_html_e( 'Affiliate Disclaimer', 'enhancingbrain' ); ?></a> <?php esc_html_e( 'for full details.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Third-party links and services', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'This site may link to third-party websites, tools, and services. We are not responsible for third-party content, accuracy, availability, policies, or practices. Your use of third-party services is at your own risk.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'No guarantees', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We strive to provide accurate and up-to-date information, but we make no warranties or guarantees regarding completeness, reliability, or results from using information on this site.', 'enhancingbrain' ); ?></p>

				<aside class="callout callout--warn" role="note">
					<p><?php esc_html_e( 'Any reliance on information from this site is solely at your own discretion and risk.', 'enhancingbrain' ); ?></p>
				</aside>

				<h2><?php esc_html_e( 'Limitation of liability', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'To the fullest extent permitted by law, Enhancing Brain and its owners, contributors, and affiliates will not be liable for any direct, indirect, incidental, consequential, or special damages arising from your use of the site or reliance on its content.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'User conduct', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'You agree not to misuse the site, attempt unauthorized access, distribute malicious code, scrape data at scale, or engage in behavior that disrupts site operation or harms others.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Privacy', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Your use of the site is also subject to our', 'enhancingbrain' ); ?> <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'enhancingbrain' ); ?></a>.</p>

				<h2><?php esc_html_e( 'Changes to these terms', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We may update these Terms & Conditions at any time. Continued use of the site after changes are posted means you accept the updated terms.', 'enhancingbrain' ); ?></p>

				<hr class="disclaimer-divider" />

				<h2><?php esc_html_e( 'Contact', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'For legal or general questions about these terms, please contact us through the', 'enhancingbrain' ); ?> <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact page', 'enhancingbrain' ); ?></a>.</p>
			</article>
		</div>
	</section>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
