<?php
/**
 * Template Name: Style Guide
 * Full design system reference for Enhancing Brain.
 * Access at: /style-guide/
 */
get_header();
?>
<main id="main-content" class="sg-page">
<div class="wrap sg-wrap">

<header class="single-header" style="max-width:760px;margin:0 auto 3rem;">
	<span class="c-mc" style="display:block;margin-bottom:.75rem;">Enhancing Brain</span>
	<h1 class="single-title">Style Guide</h1>
	<p style="color:var(--muted);font-size:.9rem;">Brand colors, typography, cards, article blocks, and reusable UI patterns for posts and pages.</p>
</header>

<section class="sg-section">
	<h2>Color Palette</h2>
	<div class="sg-swatches">
		<div class="sg-sw" style="background:#0bbf96;"><span>#0bbf96</span><small>Accent</small></div>
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

<section class="sg-section">
	<h2>Typography</h2>
	<div class="sg-type">
		<h1>H1 - Outfit 800 - Your brain is your <mark class="eb-hi">highest-ROI asset</mark></h1>
		<h2>H2 - Outfit 700 - Applied Neuroscience for High Performers</h2>
		<h3>H3 - Outfit 700 - Sleep, Focus, Memory, Nootropics</h3>
		<h4>H4 - Outfit 700 - Section Label</h4>
		<p>Body text - Plus Jakarta Sans 400. The quick brown fox jumps over the lazy dog. Applied neuroscience translates research into practical tools for better focus, memory, and long-term cognitive health.</p>
		<p><strong>Bold body text</strong> - Plus Jakarta Sans 600 for emphasis.</p>
		<p><em>Italic body text</em> - used sparingly for scientific terms.</p>
		<p><code>DM Mono 400</code> - labels, stats, and utility metadata.</p>
		<blockquote><p>The brain can change at any age, and daily habits shape that direction.</p></blockquote>
	</div>
</section>

<section class="sg-section">
	<h2>Buttons and CTAs</h2>
	<div class="sg-row" style="gap:1rem;flex-wrap:wrap;">
		<button class="f-btn" style="display:inline-flex;width:auto;padding:.75rem 1rem;">
			<span class="btn-ico" aria-hidden="true">
				<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
			</span>
			<span>Get the Free Newsletter &rarr;</span>
		</button>
		<a href="#" class="nav-cta">
			<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
			Newsletter CTA
		</a>
		<a href="#" class="lm-btn" style="display:inline-block;">Download Resource &rarr;</a>
		<a href="#" class="sh-link">View all &rarr;</a>
		<a href="#" class="c-rm">Read &rarr;</a>
	</div>
</section>

<section class="sg-section">
	<h2>Pills, Badges, Labels</h2>
	<div class="sg-row" style="flex-wrap:wrap;gap:.5rem;">
		<span class="hero-pill">Science-backed</span>
		<span class="hero-pill">Primary Sources</span>
		<span class="hero-pill">No Hype</span>
		<span class="band-tag">Brain Health</span>
		<span class="band-tag active">Focus and Productivity</span>
		<span class="c-mc">Nootropics and Supplements</span>
		<span class="ft-pill">Not a doctor - Educational use only</span>
	</div>
</section>

<section class="sg-section">
	<h2>Topic Cards</h2>
	<div class="tgrid">
		<?php
		$icon_map = [
			'brain-health-longevity' => '&#x1F9E0;',
			'focus-productivity' => '&#x1F3AF;',
			'memory-learning' => '&#x1F9E9;',
			'nootropics-supplements' => '&#x1F48A;',
		];
		foreach ( get_categories( [ 'hide_empty' => false, 'number' => 4 ] ) as $cat ) :
		?>
		<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="tc">
			<span class="tc-icon" aria-hidden="true"><?php echo wp_kses_post( $icon_map[ $cat->slug ] ?? '&#x1F4D6;' ); ?></span>
			<span class="tc-n"><?php echo esc_html( $cat->name ); ?></span>
			<?php if ( $cat->description ) : ?><span class="tc-d"><?php echo esc_html( $cat->description ); ?></span><?php endif; ?>
			<span class="tc-c"><?php echo esc_html( absint( $cat->count ) . ' ' . _n( 'article', 'articles', $cat->count, 'enhancingbrain' ) ); ?></span>
		</a>
		<?php endforeach; ?>
	</div>
</section>

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
			</div>
			<?php endif; ?>
			<div class="c-body">
				<h3 class="c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="c-exc"><?php the_excerpt(); ?></p>
				<div class="c-foot">
					<span class="c-rt"><?php echo esc_html( eb_primary_category_name( get_the_ID() ) ); ?></span>
					<a href="<?php the_permalink(); ?>" class="c-rm">Read &rarr;</a>
				</div>
			</div>
		</article>
		<?php endwhile; wp_reset_postdata();
		else : ?>
		<p style="color:var(--muted);">Publish some posts to preview this section.</p>
		<?php endif; ?>
	</div>
</section>

<section class="sg-section">
	<h2>Post Content Elements</h2>
	<div class="single-content" style="max-width:760px;">
		<h2>Heading 2 in Content</h2>
		<p>Standard paragraph with <a href="#">inline link</a>, <strong>bold emphasis</strong>, and <code>inline code</code>.</p>
		<h3>Heading 3 in Content</h3>
		<p>Helpful pull-quote style information can be highlighted below.</p>
		<blockquote><p>Your lifestyle is software for your biology. Inputs become outcomes.</p></blockquote>
		<ul>
			<li>Bullet item with clear action</li>
			<li>Bullet item tied to evidence</li>
			<li>Bullet item with implementation context</li>
		</ul>
		<ol>
			<li>Step one</li>
			<li>Step two</li>
			<li>Step three</li>
		</ol>
		<table>
			<thead><tr><th>Nutrient</th><th>Main Effect</th><th>Evidence</th></tr></thead>
			<tbody>
				<tr><td>Omega-3 DHA</td><td>Membrane support</td><td>Strong</td></tr>
				<tr><td>Lion's Mane</td><td>Neurotrophic support</td><td>Moderate</td></tr>
				<tr><td>Magnesium L-Threonate</td><td>Cognitive support</td><td>Strong</td></tr>
			</tbody>
		</table>
	</div>
</section>

<section class="sg-section">
	<h2>Disclaimer Block</h2>
	<aside class="eb-disclaimer" role="note">
		<p><?php echo esc_html( get_theme_mod( 'eb_disclaimer_text', 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.' ) ); ?></p>
	</aside>
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
.sg-sw small { font-size: .68rem; opacity: .72; }
.sg-type h1, .sg-type h2, .sg-type h3, .sg-type h4 { margin-bottom: .75rem; }
.sg-type p, .sg-type blockquote { margin-bottom: 1rem; }
.sg-row { display: flex; align-items: center; }
.sg-page .single-content ul,
.sg-page .single-content ol {
	padding-left: 1.2rem;
	margin: 0.25rem 0 1.1rem;
}
.sg-page .single-content ul { list-style: disc; }
.sg-page .single-content ol { list-style: decimal; }
.sg-page .single-content li { margin-bottom: 0.35rem; }
@media (max-width: 900px) {
	.sg-page { padding-top: 2rem; }
}
</style>

<?php get_footer(); ?>

