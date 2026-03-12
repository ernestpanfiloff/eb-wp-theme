<?php
/**
 * Template Name: Affiliate Disclaimer
 * Affiliate Disclaimer page template.
 *
 * @package enhancingbrain
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main-content" class="disclaimer-page">
	<?php while ( have_posts() ) : the_post(); ?>

	<section class="contact-hero">
		<div class="wrap">
			<span class="contact-kicker"><?php esc_html_e( 'Transparency', 'enhancingbrain' ); ?></span>
			<h1 class="contact-title"><?php esc_html_e( 'Affiliate Disclaimer', 'enhancingbrain' ); ?></h1>
			<p class="contact-sub"><?php esc_html_e( 'Last updated: March 2026', 'enhancingbrain' ); ?></p>
		</div>
	</section>

	<section class="disclaimer-main">
		<div class="wrap">
			<article class="single-content disclaimer-content">
				<h2><?php esc_html_e( 'The short version', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( "Some links on this site are affiliate links. If you buy something through one of my links, I may earn a small commission. It costs you nothing extra. The price is exactly the same as if you went directly to the brand's website.", 'enhancingbrain' ); ?></p>

				<div class="disclaimer-callout">
					<p><?php esc_html_e( 'Using my referral links is one of the easiest ways to support this project at zero additional cost to you. It keeps the content free, the newsletter going, and me researching the science full time. I genuinely appreciate it.', 'enhancingbrain' ); ?></p>
				</div>

				<h2><?php esc_html_e( 'What I would and would not promote', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'This part matters more to me than the legal boilerplate. There is a massive amount of noise in the brain health space. Supplements with no evidence. Apps with bold claims and no science. Influencers pushing whatever pays the highest commission. I am not interested in any of that.', 'enhancingbrain' ); ?></p>
				<p><?php esc_html_e( 'I only share something if it meets at least one of the following:', 'enhancingbrain' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'I personally use it and it has made a genuine difference for me.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'There is credible, peer-reviewed science supporting it and I have read and understood that research.', 'enhancingbrain' ); ?></li>
					<li><?php esc_html_e( 'It has been independently studied in human clinical trials with published results.', 'enhancingbrain' ); ?></li>
				</ul>
				<p><?php esc_html_e( 'If commissions disappeared tomorrow, my recommendations would not change. I would still point you to the same things, because my credibility with you is the only thing that matters here.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'A real example of what I will not promote', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Brain training apps are one of the most aggressively marketed products in cognitive health. They promise sharper memory, better focus, and protection against decline. The problem is that for most of these claims, the science simply does not back them up.', 'enhancingbrain' ); ?></p>

				<aside class="eb-disclaimer disclaimer-warn" role="note">
					<p>
						<strong><?php esc_html_e( 'Lumosity', 'enhancingbrain' ); ?></strong>
						<?php esc_html_e( 'was fined', 'enhancingbrain' ); ?>
						<strong><?php esc_html_e( '$2 million', 'enhancingbrain' ); ?></strong>
						<?php esc_html_e( 'by the Federal Trade Commission in 2016 for deceptive advertising. The FTC found the company claimed their games could help users perform better at work and in school, and reduce or delay cognitive impairment, without having the science to support those claims. You can', 'enhancingbrain' ); ?>
						<a href="https://www.ftc.gov/news-events/news/press-releases/2016/01/lumosity-pay-2-million-settle-ftc-deceptive-advertising-charges-its-brain-training-program" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'read the full FTC press release here', 'enhancingbrain' ); ?></a>.
						<?php esc_html_e( 'I do not promote apps like this, regardless of commission.', 'enhancingbrain' ); ?>
					</p>
				</aside>

				<h2><?php esc_html_e( 'A real example of what I do promote', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Performance Lab and their flagship product Mind Lab Pro are among the few companies in this space that have actually funded and published independent human clinical trials. Not paid testimonials. Not cherry-picked user reviews. Actual gold-standard, double-blind, placebo-controlled research conducted at the University of Leeds and published in peer-reviewed journals.', 'enhancingbrain' ); ?></p>
				<p><?php esc_html_e( 'Their studies to date have shown:', 'enhancingbrain' ); ?></p>

				<div class="disclaimer-evidence-grid">
					<div class="disclaimer-evidence-card">
						<strong><?php esc_html_e( '3 clinical trials', 'enhancingbrain' ); ?></strong>
						<span><?php esc_html_e( 'Double-blind, placebo-controlled. Published in peer-reviewed journals.', 'enhancingbrain' ); ?></span>
					</div>
					<div class="disclaimer-evidence-card">
						<strong><?php esc_html_e( '5 out of 5', 'enhancingbrain' ); ?></strong>
						<span><?php esc_html_e( 'Memory categories significantly improved vs. placebo in Study 2.', 'enhancingbrain' ); ?></span>
					</div>
					<div class="disclaimer-evidence-card">
						<strong><?php esc_html_e( '66%', 'enhancingbrain' ); ?></strong>
						<span><?php esc_html_e( 'Improvement in visual memory observed in the University of Leeds trial.', 'enhancingbrain' ); ?></span>
					</div>
					<div class="disclaimer-evidence-card">
						<strong><?php esc_html_e( '105 participants', 'enhancingbrain' ); ?></strong>
						<span><?php esc_html_e( 'Healthy adults aged 21-70 in Study 1 on information processing.', 'enhancingbrain' ); ?></span>
					</div>
				</div>

				<p><?php esc_html_e( 'Study 1 demonstrated significant improvements in reaction time, choice reaction time, and anticipation. Study 2, using the gold-standard Wechsler Memory Scale, found the Mind Lab Pro group significantly outperformed placebo across all five memory categories. A third study using EEG brain-mapping technology confirmed enhanced synergy between brain regions during decision-making tasks. You can verify all of this yourself at', 'enhancingbrain' ); ?> <a href="https://www.mindlabpro.com/pages/studies" target="_blank" rel="noopener noreferrer">mindlabpro.com/pages/studies</a>.</p>
				<p><?php esc_html_e( 'That is the bar. Independent studies, published results, verifiable data. That is what it takes to get a recommendation from me.', 'enhancingbrain' ); ?></p>

				<h2><?php esc_html_e( 'I am not a doctor', 'enhancingbrain' ); ?></h2>
				<p><?php esc_html_e( 'Nothing on this site is medical advice. I am someone who is deeply interested in neuroscience, reads the research obsessively, and shares what I find. If something has helped me personally, or if I come across a product with strong, transparent clinical evidence, I talk about it because I want others to be able to make informed decisions. That is it. Always speak to a qualified healthcare professional before making changes to your health.', 'enhancingbrain' ); ?></p>

				<hr class="disclaimer-divider" />

				<p><?php esc_html_e( 'If you ever want to know why I recommend or do not recommend a specific product, ask me.', 'enhancingbrain' ); ?> <a href="https://instagram.com/enhancingbrain" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Instagram', 'enhancingbrain' ); ?></a> <?php esc_html_e( 'is the fastest way to reach me. I am happy to walk through the reasoning.', 'enhancingbrain' ); ?></p>

				<div class="disclaimer-signature">
					<span class="disclaimer-signature-name"><?php esc_html_e( 'Ernest P.', 'enhancingbrain' ); ?></span>
					<span class="disclaimer-signature-role"><?php esc_html_e( 'Founder, Enhancing Brain', 'enhancingbrain' ); ?></span>
				</div>
			</article>
		</div>
	</section>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
