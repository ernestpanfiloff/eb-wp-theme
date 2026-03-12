<?php
/**
 * Privacy Policy page template (slug-based).
 * This file is automatically used for /privacy-policy.
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="privacy-page disclaimer-page">
	<?php while ( have_posts() ) : the_post(); ?>

	<section class="contact-hero">
		<div class="wrap">
			<span class="contact-kicker"><?php esc_html_e( 'Company & Legal', 'enhancingbrain' ); ?></span>
			<h1 class="contact-title"><?php esc_html_e( 'Privacy Policy', 'enhancingbrain' ); ?></h1>
			<p class="contact-sub"><?php esc_html_e( 'Last updated: March 2026', 'enhancingbrain' ); ?></p>
		</div>
	</section>

	<section class="disclaimer-main">
		<div class="wrap">
			<article class="single-content disclaimer-content">
				<h2><?php esc_html_e( 'Overview', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'This Privacy Policy explains what information we collect on Enhancing Brain, how we use it, and what choices you have. We only collect what we need to run the site, send requested updates, and improve the experience.', 'enhancingbrain' ); ?></p>

				<div class="callout callout--note">
					<p><?php esc_html_e( 'Your trust matters. We do not sell your personal data.', 'enhancingbrain' ); ?></p>
				</div>

				<h2><?php esc_html_e( 'Information we collect', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Depending on how you interact with the site, we may collect:', 'enhancingbrain' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Contact details you provide, such as your email address when subscribing to the newsletter.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Messages you send through contact forms, social messages, or replies.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Basic technical data such as browser type, device type, IP address, and pages visited.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Cookie and analytics data that helps us understand site performance and content quality.', 'enhancingbrain' ); ?></li>
				</ul>

				<h2><?php esc_html_e( 'How we use information', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We use collected information to:', 'enhancingbrain' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Deliver newsletters, updates, or resources you requested.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Respond to questions, collaboration requests, and support messages.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Maintain security, prevent abuse, and protect the site.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Measure content performance and improve user experience.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'Comply with legal obligations when required.', 'enhancingbrain' ); ?></li>
				</ul>

				<h2><?php esc_html_e( 'Cookies and analytics', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We may use cookies or similar technologies for functionality, performance measurement, and remembering preferences. You can control cookies in your browser settings and delete existing cookies at any time.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Affiliate links and third-party services', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Some pages may contain affiliate links. If you click a third-party link, you leave this site and are subject to that third party’s privacy policy and terms. We are not responsible for third-party practices.', 'enhancingbrain' ); ?></p>

				<aside class="callout callout--warn" role="note">
					<p><?php esc_html_e( 'Third-party platforms (for example newsletter providers, analytics services, social media platforms, and affiliate networks) may process data under their own policies.', 'enhancingbrain' ); ?></p>
				</aside>

				<h2><?php esc_html_e( 'Data retention', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We keep personal information only as long as reasonably necessary for the purposes in this policy, including legal, operational, and security needs.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Your rights and choices', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Depending on your location, you may have rights to access, correct, or delete your personal data, or object to certain processing. You may also unsubscribe from emails at any time using the unsubscribe link in each email.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Children’s privacy', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'This site is not directed to children under 13, and we do not knowingly collect personal information from children.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'Changes to this policy', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'We may update this policy periodically. When we do, we will update the "Last updated" date at the top of this page.', 'enhancingbrain' ); ?></p>

				<hr class="disclaimer-divider" />

				<h2><?php esc_html_e( 'Contact', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'If you have questions about this Privacy Policy or your data, please contact us through the', 'enhancingbrain' ); ?> <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact page', 'enhancingbrain' ); ?></a>.</p>
			</article>
		</div>
	</section>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
