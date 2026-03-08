<?php
/**
 * Template Name: Style Guide
 * Shows every design element — typography, colours, cards, buttons, components.
 * Access at: /style-guide/
 */
get_header();
?>
<main id="main-content" class="sg-page">
<div class="wrap sg-wrap">

<header class="single-header" style="max-width:720px;margin:0 auto 3rem;">
	<span class="c-mc" style="display:block;margin-bottom:.75rem;">Enhancing Brain</span>
	<h1 class="single-title">Style Guide</h1>
	<p style="color:var(--muted);font-size:.9rem;">Every design element, colour, and component. Use this to QA the theme after any update.</p>
</header>

<!-- COLOURS -->
<section class="sg-section">
	<h2>Colour Palette</h2>
	<div class="sg-swatches">
		<div class="sg-sw" style="background:#0bbf96;"><span>#0bbf96</span><small>Accent Green</small></div>
		<div class="sg-sw" style="background:#089e7d;"><span>#089e7d</span><small>Accent Dark</small></div>
		<div class="sg-sw" style="background:#0e1420;color:#fff;"><span>#0e1420</span><small>Ink</small></div>
		<div class="sg-sw" style="background:#4e5a6a;color:#fff;"><span>#4e5a6a</span><small>Muted</small></div>
		<div class="sg-sw" style="background:#6b7685;color:#fff;"><span>#6b7685</span><small>Subtle</small></div>
		<div class="sg-sw" style="background:#fafaf8;border:1px solid #e4e6ea;"><span>#fafaf8</span><small>Background</small></div>
		<div class="sg-sw" style="background:#ffffff;border:1px solid #e4e6ea;"><span>#ffffff</span><small>White</small></div>
		<div class="sg-sw" style="background:#f3f4f6;border:1px solid #e4e6ea;"><span>#f3f4f6</span><small>Surface</small></div>
		<div class="sg-sw" style="background:#e4e6ea;"><span>#e4e6ea</span><small>Border</small></div>
	</div>
</section>

<!-- TYPOGRAPHY -->
<section class="sg-section">
	<h2>Typography</h2>
	<div class="sg-type">
		<h1>H1 — Outfit 800 — Your brain is your <mark class="eb-hi">highest-ROI asset</mark></h1>
		<h2>H2 — Outfit 700 — Applied Neuroscience for High Performers</h2>
		<h3>H3 — Outfit 700 — Sleep, Focus, Memory, Nootropics</h3>
		<h4>H4 — Outfit 700 — Section Label</h4>
		<p>Body text — Plus Jakarta Sans 400. The quick brown fox jumps over the lazy dog. Neuroscience is the study of the nervous system — including the brain, spinal cord, and peripheral nerves. Applied neuroscience translates that research into tools for peak performance.</p>
		<p><strong>Bold body text</strong> — Plus Jakarta Sans 600. Used for emphasis within paragraphs.</p>
		<p><em>Italic body text</em> — Used sparingly for technical terms.</p>
		<p><mark class="eb-hi">Playfair Display italic green</mark> — used in headlines via [eb_highlight] shortcode.</p>
		<p><code>DM Mono 400</code> — labels, eyebrows, category badges, code.</p>
		<blockquote><p>Blockquote — Neuroscience is not destiny. The brain can change at any age — and the choices you make every day determine the direction.</p></blockquote>
	</div>
</section>

<!-- BUTTONS -->
<section class="sg-section">
	<h2>Buttons & CTAs</h2>
	<div class="sg-row" style="gap:1rem;flex-wrap:wrap;">
		<button class="f-btn" style="display:inline-block;">Primary Button</button>
		<a href="#" class="nav-cta">
			<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
			Nav CTA Button
		</a>
		<a href="#" class="lm-btn" style="display:inline-block;">Lead Magnet CTA</a>
		<a href="#" class="sh-link">View All Link →</a>
		<a href="#" class="c-rm">Read Article →</a>
	</div>
</section>

<!-- PILLS & BADGES -->
<section class="sg-section">
	<h2>Pills, Badges & Labels</h2>
	<div class="sg-row" style="flex-wrap:wrap;gap:.5rem;">
		<span class="hero-pill">Science-backed</span>
		<span class="hero-pill">Primary sources</span>
		<span class="hero-pill">No BS</span>
		<span class="band-tag">Brain Health</span>
		<span class="band-tag active">Focus & Productivity</span>
		<span class="c-mc">Nootropics · Supplements</span>
		<span class="ft-pill">⚠ Not a doctor · Educational use only</span>
	</div>
</section>

<!-- CARDS -->
<section class="sg-section">
	<h2>Article Cards</h2>
	<div class="grid3">
		<?php
		$sample = new WP_Query( [ 'posts_per_page' => 3, 'post_status' => 'publish' ] );
		if ( $sample->have_posts() ) :
			while ( $sample->have_posts() ) : $sample->the_post();
		?>
		<article class="card card-sm" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="c-thumb">
				<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
					<?php the_post_thumbnail( 'eb-card', [ 'loading' => 'lazy', 'alt' => esc_attr( get_the_title() ) ] ); ?>
				</a>
				<?php echo eb_category_badge(); ?>
			</div>
			<?php endif; ?>
			<div class="c-body">
				<div class="c-meta" aria-hidden="true">
					<?php $cats = get_the_category(); if ( $cats ) echo '<span class="c-mc">' . esc_html( $cats[0]->name ) . '</span>'; ?>
				</div>
				<h3 class="c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="c-exc"><?php the_excerpt(); ?></p>
				<div class="c-foot">
					<span class="c-rt">⏱ <?php echo esc_html( eb_read_time() ); ?> min</span>
					<a href="<?php the_permalink(); ?>" class="c-rm">Read →</a>
				</div>
			</div>
		</article>
		<?php endwhile; wp_reset_postdata();
		else : ?>
		<p style="color:var(--muted);">Publish some posts to see cards here.</p>
		<?php endif; ?>
	</div>
</section>

<!-- TOPIC CARDS -->
<section class="sg-section">
	<h2>Topic Cards</h2>
	<div class="tgrid">
		<?php
		$icons = [ '🧠', '🎯', '🧬', '💊' ];
		foreach ( get_categories( [ 'hide_empty' => false, 'number' => 4 ] ) as $i => $cat ) : ?>
		<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="tc">
			<span class="tc-icon" aria-hidden="true"><?php echo $icons[ $i % 4 ]; ?></span>
			<span class="tc-n"><?php echo esc_html( $cat->name ); ?></span>
			<?php if ( $cat->description ) : ?><span class="tc-d"><?php echo esc_html( $cat->description ); ?></span><?php endif; ?>
			<span class="tc-c"><?php echo $cat->count; ?> articles</span>
		</a>
		<?php endforeach; ?>
	</div>
</section>

<!-- DISCLAIMER -->
<section class="sg-section">
	<h2>Disclaimer Component</h2>
	<aside class="eb-disclaimer" role="note">
		<p><?php echo esc_html( get_theme_mod( 'eb_disclaimer_text', 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.' ) ); ?></p>
	</aside>
</section>

<!-- CONTENT ELEMENTS -->
<section class="sg-section">
	<h2>Content / Post Body Elements</h2>
	<div class="single-content" style="max-width:720px;">
		<h2>Heading 2 Inside Content</h2>
		<p>Standard paragraph. Neuroscience is not destiny. The choices you make every day — sleep, exercise, nutrition, stress management — directly shape the structure and function of your brain.</p>
		<h3>Heading 3 Inside Content</h3>
		<p>Another paragraph with an inline <a href="#">link in green</a> and <strong>bold text</strong> and <code>inline code</code>.</p>
		<blockquote><p>The brain is not a static organ. It is a prediction machine constantly rewriting itself based on experience.</p></blockquote>
		<ul>
			<li>Bullet point one — concise and actionable</li>
			<li>Bullet point two — backed by primary research</li>
			<li>Bullet point three — applicable to your daily routine</li>
		</ul>
		<ol>
			<li>Numbered step one</li>
			<li>Numbered step two</li>
			<li>Numbered step three</li>
		</ol>
		<table>
			<thead><tr><th>Nutrient</th><th>Primary Effect</th><th>Evidence Level</th></tr></thead>
			<tbody>
				<tr><td>Omega-3 DHA</td><td>Synaptic membrane fluidity</td><td>Strong (RCTs)</td></tr>
				<tr><td>Lion's Mane</td><td>NGF stimulation</td><td>Moderate</td></tr>
				<tr><td>Magnesium L-Threonate</td><td>Brain magnesium elevation</td><td>Strong (RCTs)</td></tr>
			</tbody>
		</table>
	</div>
</section>

</div>
</main>

<style>
.sg-page { padding: 3rem 0 5rem; }
.sg-wrap { max-width: 1100px; }
.sg-section { margin-bottom: 4rem; padding-bottom: 3rem; border-bottom: 1px solid var(--border); }
.sg-section:last-child { border-bottom: none; }
.sg-section > h2 { font-size: 1.1rem; font-family: var(--mono); letter-spacing: .12em; text-transform: uppercase; color: var(--accent); margin-bottom: 1.5rem; }
.sg-swatches { display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: .75rem; }
.sg-sw { border-radius: 6px; padding: 1.25rem .75rem .75rem; min-height: 90px; display: flex; flex-direction: column; justify-content: flex-end; }
.sg-sw span { font-family: var(--mono); font-size: .72rem; display: block; margin-bottom: .15rem; }
.sg-sw small { font-size: .68rem; opacity: .7; }
.sg-type h1, .sg-type h2, .sg-type h3, .sg-type h4 { margin-bottom: .75rem; }
.sg-type p, .sg-type blockquote { margin-bottom: 1rem; }
.sg-row { display: flex; align-items: center; }
</style>

<?php get_footer(); ?>
