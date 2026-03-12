<?php
/**
 * Enhancing Brain - Sample Data Installer
 * Creates sample categories, posts, and pages on theme activation.
 * Only runs once - checks for a flag in options.
 */

defined( 'ABSPATH' ) || exit;

function eb_install_sample_data() {
	if ( get_option( 'eb_sample_data_installed' ) === 'v3' ) return;

	/* Categories */
	$cats = [
		[ 'Brain Health & Longevity', 'brain-health-longevity', 'Sleep, exercise, nutrition, neuroplasticity, and protecting cognitive health long-term.' ],
		[ 'Focus & Productivity',     'focus-productivity',     'Dopamine, attention systems, eliminating distraction, and building deep work capacity.' ],
		[ 'Memory & Learning',        'memory-learning',        'Neuroplasticity, memory consolidation, spaced repetition, and accelerated learning.' ],
		[ 'Nootropics & Supplements', 'nootropics-supplements', 'Evidence-based nootropics, cognitive supplements, and what the research actually shows.' ],
	];
	$cat_ids = [];
	foreach ( $cats as [$name, $slug, $desc] ) {
		$existing = get_term_by( 'slug', $slug, 'category' );
		if ( $existing ) {
			$cat_ids[$slug] = $existing->term_id;
		} else {
			$result = wp_insert_term( $name, 'category', [ 'slug' => $slug, 'description' => $desc ] );
			if ( ! is_wp_error( $result ) ) $cat_ids[$slug] = $result['term_id'];
		}
	}

	/* Sample posts */
	$posts = [
		[
			'title'   => 'The Neuroscience of Deep Sleep: Why 7–9 Hours Isn\'t Enough',
			'slug'    => 'neuroscience-deep-sleep',
			'cat'     => 'brain-health-longevity',
			'excerpt' => 'Total sleep time is only part of the equation. Learn why slow-wave sleep and REM cycles are what actually drive memory consolidation, cellular repair, and next-day cognitive performance.',
			'content' => '<h2>Sleep architecture matters more than you think</h2><p>Most people track total sleep hours. But neuroscientists focus on sleep architecture — the specific sequence of NREM and REM cycles your brain cycles through each night. Each stage serves a completely different neurological function.</p><h2>What happens during slow-wave sleep</h2><p>Slow-wave sleep (SWS) is when your brain does its most important maintenance work. The glymphatic system activates, flushing out metabolic waste including beta-amyloid — a protein associated with Alzheimer\'s disease. Growth hormone is released. Neural connections are pruned and strengthened. Miss this stage and no amount of extra time in bed will compensate.</p><h2>REM and emotional memory</h2><p>REM sleep is when your brain processes emotionally significant events. Researcher Matthew Walker describes it as "overnight therapy" — REM strips the emotional charge from memories while preserving the informational content. Poor REM sleep is strongly associated with anxiety, impaired emotional regulation, and reduced creativity.</p><h2>Practical optimisation</h2><p>The first two sleep cycles (roughly hours 1–4) are dominated by slow-wave sleep. The later cycles (hours 5–8) contain more REM. This is why cutting sleep short is so costly — you disproportionately lose REM. Keep a consistent sleep schedule, cool your room to 18–19°C, and eliminate alcohol, which suppresses REM significantly.</p><p>[eb_disclaimer]</p>',
		],
		[
			'title'   => 'Dopamine Is Not a Reward Chemical (Here\'s What It Actually Does)',
			'slug'    => 'dopamine-not-reward',
			'cat'     => 'focus-productivity',
			'excerpt' => 'Most people think dopamine is about pleasure. Neuroscience shows it\'s actually about motivation, prediction errors, and the drive to pursue — not the feeling of having.',
			'content' => '<h2>The motivation molecule</h2><p>Dopamine is the brain\'s anticipation chemical — it fires in response to the <em>prediction</em> of reward, not the reward itself. This is why completing a difficult task feels so good: it confirms a positive prediction. Understanding this changes how you approach motivation entirely.</p><h2>Prediction error signals</h2><p>Wolfram Schultz\'s foundational research showed that dopamine neurons fire when a reward is better than expected (positive prediction error) and are suppressed when a reward is worse than expected (negative prediction error). This circuit is responsible for all learning from feedback.</p><h2>How this affects productivity</h2><p>Constantly seeking easy dopamine hits (social media, processed food, cheap entertainment) raises your baseline, making the low-dopamine activities required for deep work feel unbearable. The solution is not suppressing dopamine — it\'s calibrating your reward system by creating an environment where meaningful work is your primary source of it.</p><p>[eb_disclaimer]</p>',
		],
		[
			'title'   => '6 Memory Techniques Backed by Neuroscience',
			'slug'    => '6-memory-techniques-neuroscience',
			'cat'     => 'memory-learning',
			'excerpt' => 'Rereading is the least effective study strategy. These six evidence-based techniques leverage how memory actually forms — dramatically outperforming passive review.',
			'content' => '<h2>1. Spaced repetition</h2><p>Hermann Ebbinghaus identified the forgetting curve in 1885. Reviewing material at increasing intervals exploits reconsolidation — the brain strengthens a memory every time it is retrieved. Apps like Anki automate the optimal spacing schedule.</p><h2>2. Active recall</h2><p>Closing the book and trying to retrieve information strengthens the memory trace far more than rereading. The testing effect, demonstrated in hundreds of studies, shows that retrieval practice produces better long-term retention than additional study time.</p><h2>3. Elaborative interrogation</h2><p>Asking "why is this true?" forces you to connect new information to existing knowledge. This creates more retrieval routes — more ways for your brain to find the memory later.</p><h2>4. The Method of Loci</h2><p>Visualise information placed at specific locations along a familiar route. Memory champions use this almost universally. It works because spatial and episodic memory systems are among the oldest and most robust in the brain.</p><h2>5. Interleaving</h2><p>Rather than blocking practice by topic, mix subjects together. This feels harder and produces worse immediate performance — but significantly better long-term retention and transfer.</p><h2>6. Sleep within 24 hours of learning</h2><p>New memories are consolidated during sleep. Studying before bed and getting full sleep cycles within 24 hours of initial learning dramatically improves retention.</p><p>[eb_disclaimer]</p>',
		],
		[
			'title'   => 'Magnesium L-Threonate: The Only Form That Crosses the Blood-Brain Barrier',
			'slug'    => 'magnesium-l-threonate-brain',
			'cat'     => 'nootropics-supplements',
			'excerpt' => 'Most magnesium supplements don\'t reach the brain. Magnesium L-Threonate was specifically developed to increase cerebrospinal fluid magnesium — with documented effects on synaptic density and memory.',
			'content' => '<h2>Why magnesium matters for the brain</h2><p>Magnesium is a cofactor in over 300 enzymatic reactions and is essential for NMDA receptor function — critical for synaptic plasticity and memory formation. Deficiency, which affects an estimated 50% of the population, is associated with impaired cognition, anxiety, and poor sleep.</p><h2>The blood-brain barrier problem</h2><p>Most magnesium forms — oxide, citrate, glycinate — are well-absorbed in the gut but poorly transported across the blood-brain barrier. Brain magnesium levels remain low even when serum levels are optimal. This is the core limitation of standard supplementation.</p><h2>What makes L-Threonate different</h2><p>Magnesium L-Threonate was developed by researchers at MIT specifically to increase brain magnesium. The threonate chelate enables transport via SMCT2, a transporter expressed in the choroid plexus. Human trials have shown significant increases in cerebrospinal fluid magnesium levels.</p><h2>The evidence</h2><p>A 2016 trial in older adults with cognitive impairment showed significant improvements in executive function, working memory, and attention after 12 weeks. Effect sizes were substantial relative to the placebo group.</p><h2>Dosing</h2><p>Clinical trials used 1.5–2g of elemental magnesium delivered as L-Threonate, typically split across two doses. Take with the evening dose near sleep for synergistic benefits on sleep quality.</p><p>[eb_disclaimer]</p>',
		],
		[
			'title'   => 'The Prefrontal Cortex: How Stress Literally Shuts Off Your Brain\'s CEO',
			'slug'    => 'stress-prefrontal-cortex',
			'cat'     => 'brain-health-longevity',
			'excerpt' => 'Under acute stress, the brain redirects blood flow away from the prefrontal cortex toward survival circuits. This is not metaphor — it\'s measurable, reversible, and explains why you make bad decisions when you\'re overwhelmed.',
			'content' => '<h2>The prefrontal cortex under stress</h2><p>The prefrontal cortex (PFC) is responsible for executive function: planning, impulse control, working memory, and rational decision-making. It is also the brain region most sensitive to stress hormones — particularly norepinephrine and cortisol.</p><h2>The neurochemistry of overwhelm</h2><p>Under moderate to high stress, the amygdala — the brain\'s threat-detection system — suppresses PFC activity while amplifying subcortical responses. This is adaptive in genuine survival situations. But in modern life, this hijack is frequently triggered by email overload, financial pressure, or social conflict, with the same neurological effect.</p><h2>Cortisol and synaptic pruning</h2><p>Chronic stress causes sustained cortisol elevation, which over time physically reduces dendritic branching in the PFC. This is not temporary — it causes measurable structural changes. The good news: these are reversible with chronic stress reduction.</p><h2>Recovery strategies</h2><p>Brief physiological sigh (double inhale through the nose, long exhale through the mouth) is the fastest way to downregulate the stress response. It works by rapidly changing the CO2/O2 ratio in the blood, activating the parasympathetic nervous system within seconds. Consistent aerobic exercise, social connection, and sleep are the long-term regulators.</p><p>[eb_disclaimer]</p>',
		],
	];

	foreach ( $posts as $p ) {
		if ( get_page_by_path( $p['slug'], OBJECT, 'post' ) ) continue;

		$post_id = wp_insert_post( [
			'post_title'   => $p['title'],
			'post_name'    => $p['slug'],
			'post_content' => $p['content'],
			'post_excerpt' => $p['excerpt'],
			'post_status'  => 'publish',
			'post_type'    => 'post',
		] );

		if ( $post_id && ! is_wp_error( $post_id ) ) {
			if ( isset( $cat_ids[ $p['cat'] ] ) ) {
				wp_set_post_categories( $post_id, [ $cat_ids[ $p['cat'] ] ] );
			}
		}
	}

	/* Sample pages */
	$pages = [
		[
			'title'   => 'Home',
			'slug'    => 'home',
			'content' => '<!-- Front page — rendered by front-page.php template -->',
		],
		[
			'title'   => 'About',
			'slug'    => 'about',
			'content' => '<h2>About Enhancing Brain</h2><p>Enhancing Brain is a science-backed resource for entrepreneurs, professionals, and creators who want to understand and optimise how their brain actually works.</p><p>Every article cites primary research. No guesswork, no hype, no "life hacks" without evidence.</p><h2>Who this is for</h2><p>If you\'re serious about your work, your clarity, and your long-term cognitive health — this is for you. We translate peer-reviewed neuroscience into practical, actionable information.</p><h2>What we cover</h2><ul><li>Brain health and longevity</li><li>Focus and deep work</li><li>Memory and learning</li><li>Evidence-based nootropics</li><li>Sleep science</li><li>Neuroplasticity</li></ul><p>[eb_disclaimer]</p>',
		],
		[
			'title'   => 'Contact',
			'slug'    => 'contact',
			'template'=> 'page-contact.php',
			'content' => '<!-- Contact page uses page-contact.php template -->',
		],
		[
			'title'   => 'Articles',
			'slug'    => 'articles',
			'content' => '<!-- This page acts as the posts page. WordPress populates it automatically. -->',
		],
		[
			'title'   => 'Privacy Policy',
			'slug'    => 'privacy-policy',
			'content' => '<h2>Privacy Policy</h2><p>This privacy policy explains how Enhancing Brain handles your personal data.</p><h3>Information We Collect</h3><p>When you subscribe to our newsletter, we collect your name and email address. We use this only to send you the newsletter you signed up for.</p><h3>How We Use Your Information</h3><p>We never sell, rent, or share your personal data with third parties for marketing purposes.</p><h3>Cookies</h3><p>This site uses essential cookies for functionality. Analytics cookies may be used to understand site traffic in aggregate.</p><h3>Contact</h3><p>For any privacy questions, contact us via Instagram @enhancingbrain.</p>',
		],
		[
			'title'   => 'Style Guide',
			'slug'    => 'style-guide',
			'template'=> 'page-style-guide.php',
			'content' => '',
		],
		[
			'title'   => 'Affiliate Disclaimer',
			'slug'    => 'affiliate-disclaimer',
			'content' => '<h2>Affiliate Disclaimer</h2><p>Some links on this site may be affiliate links. If you purchase through those links, we may earn a small commission at no additional cost to you.</p><p>We only share products and tools we believe are useful and aligned with our evidence-based standards.</p>',
		],
		[
			'title'   => 'Terms & Conditions',
			'slug'    => 'terms-and-conditions',
			'content' => '<h2>Terms & Conditions</h2><p>By using this website, you agree to these terms. Content is provided for educational purposes and may not be interpreted as medical advice.</p><p>We may update site content and these terms at any time.</p>',
		],
	];

	foreach ( $pages as $pg ) {
		if ( get_page_by_path( $pg['slug'] ) ) continue;
		$args = [
			'post_title'     => $pg['title'],
			'post_name'      => $pg['slug'],
			'post_content'   => $pg['content'],
			'post_status'    => 'publish',
			'post_type'      => 'page',
		];
		$page_id = wp_insert_post( $args );
		if ( $page_id && ! is_wp_error( $page_id ) && ! empty( $pg['template'] ) ) {
			update_post_meta( $page_id, '_wp_page_template', $pg['template'] );
		}
	}


	/* Auto-configure Reading Settings so front-page.php loads correctly */
	$front_page_id = get_page_by_path( 'home' );
	$posts_page_id = get_page_by_path( 'articles' );

	/* If no "home" page exists, find Sample Page or first page */
	if ( ! $front_page_id ) {
		$all_pages = get_posts( [ 'post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'ASC' ] );
		$front_page_id = $all_pages ? $all_pages[0] : null;
	}

	if ( $front_page_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		if ( $posts_page_id ) {
			update_option( 'page_for_posts', $posts_page_id->ID );
		}
	}

	/* Save visibility defaults so sections show immediately without publishing customizer */
	set_theme_mod( 'eb_hero_visible',     '1' );
	set_theme_mod( 'eb_stats_visible',    '1' );
	set_theme_mod( 'eb_articles_visible', '1' );
	set_theme_mod( 'eb_lm_visible',       '1' );
	set_theme_mod( 'eb_topics_visible',   '1' );

	update_option( 'eb_sample_data_installed', 'v3' );
}
add_action( 'after_switch_theme', 'eb_install_sample_data' );

/* Admin notice to set homepage */
function eb_setup_notice() {
	$screen = get_current_screen();
	if ( ! $screen || $screen->id !== 'themes' ) return;
	if ( get_option( 'eb_setup_notice_dismissed' ) ) return;
	?>
	<div class="notice notice-info is-dismissible" id="eb-setup-notice">
		<p><strong>Enhancing Brain theme activated!</strong>
        Quick setup: <a href="<?php echo esc_url( admin_url( 'options-reading.php' ) ); ?>">Settings -> Reading</a> - set "Your homepage displays" to "A static page" -> Homepage: <strong>Home</strong>. Then <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">Appearance -> Menus</a> to build your navigation. <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">Appearance -> Customize -> Enhancing Brain</a> to edit all content.</p>
	</div>
	<script>jQuery(function($){ $('#eb-setup-notice').on('click','.notice-dismiss',function(){ $.post(ajaxurl,{action:'eb_dismiss_notice',nonce:'<?php echo wp_create_nonce("eb_dismiss"); ?>'}); }); });</script>
	<?php
}
add_action( 'admin_notices', 'eb_setup_notice' );

function eb_dismiss_notice_ajax() {
	check_ajax_referer( 'eb_dismiss', 'nonce' );
	update_option( 'eb_setup_notice_dismissed', true );
	wp_die();
}
add_action( 'wp_ajax_eb_dismiss_notice', 'eb_dismiss_notice_ajax' );
