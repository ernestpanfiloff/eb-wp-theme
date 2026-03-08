<?php
/**
 * Front page template â€” Enhancing Brain homepage
 */
get_header();
?>

<main id="main-content">

	<!-- â•â• HERO â•â• -->
	<?php if ( get_theme_mod( 'eb_hero_visible', '1' ) ) : ?>
	<section class="hero" aria-labelledby="hero-heading">
		<div class="hero-bg"   aria-hidden="true"></div>
		<div class="hero-glow" aria-hidden="true"></div>
		<div class="hero-grid">
			<div class="hero-divider" aria-hidden="true"></div>

			<div class="hero-l rev">
				<?php $eyebrow = get_theme_mod( 'eb_hero_eyebrow', 'Welcome to Enhancing Brain' ); ?>
				<?php if ( $eyebrow ) : ?>
				<div class="hero-eyebrow" aria-hidden="true"><?php echo esc_html( $eyebrow ); ?></div>
				<?php endif; ?>

				<h1 id="hero-heading" class="hero-h1">
					<?php echo eb_customizer_text( 'eb_hero_headline', 'Train your brain like your success depends on it. [eb_highlight]Because it does.[/eb_highlight]' ); ?>
				</h1>

				<p class="hero-p"><?php echo esc_html( get_theme_mod( 'eb_hero_subheadline', 'Learn how to improve focus, sharpen thinking, protect your brain from burnout, and perform at your best using neuroscience.' ) ); ?></p>

				<?php
				$pills_raw = get_theme_mod( 'eb_hero_pills', 'Science-backed, Primary sources, No BS, Free weekly newsletter, Not medical advice' );
				$pills     = array_filter( array_map( 'trim', explode( ',', $pills_raw ) ) );
				if ( $pills ) :
				?>
				<div class="hero-pills" aria-label="<?php esc_attr_e( 'What we offer', 'enhancingbrain' ); ?>">
					<?php foreach ( $pills as $pill ) : ?>
					<span class="hero-pill"><?php echo esc_html( $pill ); ?></span>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>

			<!-- Newsletter form -->
			<div class="hero-form rev" id="newsletter">
				<span class="f-label" aria-hidden="true"><?php echo esc_html( get_theme_mod( 'eb_nl_label', '#1 Newsletter on brain performance.' ) ); ?></span>
				<h2 class="f-title"><?php echo esc_html( get_theme_mod( 'eb_nl_title', 'Neuroscience for High Performers.' ) ); ?></h2>
				<p class="f-desc"><?php echo esc_html( get_theme_mod( 'eb_nl_desc', 'Actionable tips on memory, focus, brain health, nootropics and more... Weekly 5-min reads.' ) ); ?></p>

				<?php $action = get_theme_mod( 'eb_nl_form_action', '' ); ?>
				<form class="f-inputs" action="<?php echo esc_url( $action ?: '#' ); ?>" method="post" novalidate aria-label="<?php esc_attr_e( 'Newsletter signup', 'enhancingbrain' ); ?>">
					<?php wp_nonce_field( 'eb_newsletter', 'eb_nl_nonce' ); ?>
					<div class="f-field">
						<label for="fname" class="sr-only"><?php esc_html_e( 'First name', 'enhancingbrain' ); ?></label>
						<input type="text"  id="fname"  name="FNAME" placeholder="<?php esc_attr_e( 'Your first name', 'enhancingbrain' ); ?>" autocomplete="given-name"/>
					</div>
					<div class="f-field">
						<label for="femail" class="sr-only"><?php esc_html_e( 'Email address', 'enhancingbrain' ); ?></label>
						<input type="email" id="femail" name="EMAIL" placeholder="<?php esc_attr_e( 'Your best email', 'enhancingbrain' ); ?>" required autocomplete="email"/>
					</div>
					<button type="submit" class="f-btn">
						<span class="btn-ico" aria-hidden="true">
							<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
						</span>
						<span><?php echo esc_html( get_theme_mod( 'eb_nl_btn', 'Subscribe for free →' ) ); ?></span>
					</button>
				</form>

				<div class="f-foot">
					<span class="f-disc"><?php echo esc_html( get_theme_mod( 'eb_nl_disclaimer', 'No spam. No AI slop. Unsubscribe anytime.' ) ); ?></span>
					<div class="f-proof" aria-label="<?php echo esc_attr( get_theme_mod( 'eb_nl_proof', 'Joined by 600+ readers' ) ); ?>">
						<div class="f-avs" aria-hidden="true">
							<div class="f-av"></div>
							<div class="f-av"></div>
							<div class="f-av"></div>
						</div>
						<span><?php echo esc_html( get_theme_mod( 'eb_nl_proof', 'Joined by 600+ readers' ) ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; // eb_hero_visible ?>

	<!-- â•â• STATS BAR â•â• -->
	<?php if ( get_theme_mod( 'eb_stats_visible', '1' ) ) : ?>
	<section class="stats" aria-label="<?php esc_attr_e( 'Enhancing Brain by the numbers', 'enhancingbrain' ); ?>">
		<div class="stats-inner">
			<?php
			$_stat_defaults = [
				1 => [ '600+',  'Newsletter Subscribers' ],
				2 => [ '100K+', 'Social media following' ],
				3 => [ '200M+', 'Social media views'    ],
				4 => [ '5 min', 'Average Read Time'      ],
			];
			for ( $i = 1; $i <= 4; $i++ ) :
				$num = get_theme_mod( "eb_stat_{$i}_number", $_stat_defaults[$i][0] );
				$lbl = get_theme_mod( "eb_stat_{$i}_label",  $_stat_defaults[$i][1] );
				if ( $num ) :
			?>
			<div class="st">
				<span class="st-n"><?php echo esc_html( $num ); ?></span>
				<span class="st-l"><?php echo esc_html( $lbl ); ?></span>
			</div>
			<?php endif; endfor; ?>
		</div>
	</section>
	<?php endif; ?>

<!-- AUDIENCE BAND -->
<div class="band rev" aria-hidden="true">
	<div class="band-inner">
		<span class="band-lbl">FOR:</span>
		<div class="for-mq-wrap">
			<div class="for-mq-track">
				<span class="hero-pill">High Achievers</span>
				<span class="hero-pill">Entrepreneurs</span>
				<span class="hero-pill">CEOs</span>
				<span class="hero-pill">Founders</span>
				<span class="hero-pill">Investors</span>
				<span class="hero-pill">Coaches</span>
				<span class="hero-pill">Creators</span>
				<span class="hero-pill">Executives</span>
				<span class="hero-pill">Operators</span>
				<span class="hero-pill">Business Owners</span>
				<span class="hero-pill">Managers</span>
				<span class="hero-pill">Creatives</span>
				<span class="hero-pill">Peak Performers</span>
				<!-- duplicate for seamless loop -->
				<span class="hero-pill">High Achievers</span>
				<span class="hero-pill">Entrepreneurs</span>
				<span class="hero-pill">CEOs</span>
				<span class="hero-pill">Founders</span>
				<span class="hero-pill">Investors</span>
				<span class="hero-pill">Coaches</span>
				<span class="hero-pill">Creators</span>
				<span class="hero-pill">Executives</span>
				<span class="hero-pill">Operators</span>
				<span class="hero-pill">Business Owners</span>
				<span class="hero-pill">Managers</span>
				<span class="hero-pill">Creatives</span>
				<span class="hero-pill">Peak Performers</span>
			</div>
		</div>
	</div>
</div>
	</div>

	<!-- â•â• ARTICLES â•â• -->
	<?php if ( get_theme_mod( 'eb_articles_visible', '1' ) ) :
	$posts_count = absint( get_theme_mod( 'eb_articles_count', 5 ) );
	$featured    = new WP_Query( [
		'posts_per_page' => $posts_count,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
		'ignore_sticky_posts' => true,
	] );
	if ( $featured->have_posts() ) :
		$all_posts = [];
		while ( $featured->have_posts() ) : $featured->the_post();
			$all_posts[] = get_post();
		endwhile;
		wp_reset_postdata();
	?>
	<section class="articles rev" aria-labelledby="articles-heading">
		<div class="wrap">
			<div class="sh">
				<div class="sh-left">
					<span class="sh-ey" aria-hidden="true"><?php echo esc_html( get_theme_mod( 'eb_articles_eyebrow', 'Blog' ) ); ?></span>
					<h2 id="articles-heading" class="sh-t"><?php echo esc_html( get_theme_mod( 'eb_articles_heading', 'Latest Articles' ) ); ?></h2>
				</div>
				<a href="<?php echo esc_url( home_url( '/articles' ) ); ?>" class="sh-link">
					<?php echo esc_html( get_theme_mod( 'eb_articles_link_text', 'View all articles →' ) ); ?>
				</a>
			</div>

			<div class="articles-grid">
			<!-- Featured row: main card + 2 stack cards -->
			<?php if ( count( $all_posts ) >= 1 ) : ?>
			<div class="feat">
				<?php
				$main  = $all_posts[0];
				$stack = array_slice( $all_posts, 1, 2 );
				setup_postdata( $main );
				?>
				<article class="card" aria-label="<?php echo esc_attr( get_the_title( $main ) ); ?>">
					<?php if ( has_post_thumbnail( $main ) ) : ?>
					<div class="c-thumb">
						<a href="<?php echo esc_url( get_permalink( $main ) ); ?>" tabindex="-1" aria-hidden="true">
							<?php echo get_the_post_thumbnail( $main, 'eb-featured', [
								'alt'     => esc_attr( get_the_title( $main ) ),
								'loading' => 'eager',
								'decoding'=> 'async',
							] ); ?>
						</a>
					</div>
					<?php endif; ?>
					<div class="c-body">
						<?php if ( ! has_post_thumbnail( $main ) ) echo eb_category_badge( $main->ID ); ?>
						<h3 class="c-title"><a href="<?php echo esc_url( get_permalink( $main ) ); ?>"><?php echo esc_html( get_the_title( $main ) ); ?></a></h3>
						<p class="c-exc"><?php echo esc_html( get_the_excerpt( $main ) ); ?></p>
						<div class="c-foot">
							<span class="c-rt"><?php echo esc_html( eb_primary_category_name( $main->ID ) ); ?></span>
							<a href="<?php echo esc_url( get_permalink( $main ) ); ?>" class="c-rm" aria-label="<?php printf( esc_attr__( 'Read: %s', 'enhancingbrain' ), esc_attr( get_the_title( $main ) ) ); ?>">
								<?php esc_html_e( 'Read article →', 'enhancingbrain' ); ?>
							</a>
						</div>
					</div>
				</article>

				<?php if ( $stack ) : ?>
				<div class="stack">
					<?php foreach ( $stack as $post ) : setup_postdata( $post ); ?>
					<article class="card card-h" aria-label="<?php echo esc_attr( get_the_title( $post ) ); ?>">
						<?php if ( has_post_thumbnail( $post ) ) : ?>
						<div class="c-thumb">
							<a href="<?php echo esc_url( get_permalink( $post ) ); ?>" tabindex="-1" aria-hidden="true">
								<?php echo get_the_post_thumbnail( $post, 'eb-card-thumb', [
									'alt'     => esc_attr( get_the_title( $post ) ),
									'loading' => 'lazy',
									'decoding'=> 'async',
								] ); ?>
							</a>
						</div>
						<?php endif; ?>
						<div class="c-body">
							<?php if ( ! has_post_thumbnail( $post ) ) echo eb_category_badge( $post->ID ); ?>
							<h3 class="c-title"><a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></h3>
							<p class="c-exc"><?php echo esc_html( get_the_excerpt( $post ) ); ?></p>
							<div class="c-foot">
								<span class="c-rt"><?php echo esc_html( eb_primary_category_name( $post->ID ) ); ?></span>
								<a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="c-rm" aria-label="<?php printf( esc_attr__( 'Read: %s', 'enhancingbrain' ), esc_attr( get_the_title( $post ) ) ); ?>">
									<?php esc_html_e( 'Read →', 'enhancingbrain' ); ?>
								</a>
							</div>
						</div>
					</article>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<!-- Grid: posts 4-6 -->
			<?php $grid = array_slice( $all_posts, 3, 3 ); if ( $grid ) : ?>
			<div class="grid3">
				<?php foreach ( $grid as $post ) : setup_postdata( $post ); ?>
				<article class="card card-sm" aria-label="<?php echo esc_attr( get_the_title( $post ) ); ?>">
					<?php if ( has_post_thumbnail( $post ) ) : ?>
					<div class="c-thumb">
						<a href="<?php echo esc_url( get_permalink( $post ) ); ?>" tabindex="-1" aria-hidden="true">
							<?php echo get_the_post_thumbnail( $post, 'eb-card', [
								'alt'     => esc_attr( get_the_title( $post ) ),
								'loading' => 'lazy',
								'decoding'=> 'async',
							] ); ?>
						</a>
					</div>
					<?php endif; ?>
					<div class="c-body">
						<?php if ( ! has_post_thumbnail( $post ) ) echo eb_category_badge( $post->ID ); ?>
						<h3 class="c-title"><a href="<?php echo esc_url( get_permalink( $post ) ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></h3>
						<p class="c-exc"><?php echo esc_html( get_the_excerpt( $post ) ); ?></p>
						<div class="c-foot">
							<span class="c-rt"><?php echo esc_html( eb_primary_category_name( $post->ID ) ); ?></span>
							<a href="<?php echo esc_url( get_permalink( $post ) ); ?>" class="c-rm" aria-label="<?php printf( esc_attr__( 'Read: %s', 'enhancingbrain' ), esc_attr( get_the_title( $post ) ) ); ?>">
								<?php esc_html_e( 'Read →', 'enhancingbrain' ); ?>
							</a>
						</div>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
			<?php endif; wp_reset_postdata(); ?>
			</div><!-- /.articles-grid -->
		</div>
	</section>
	<?php endif; // $featured->have_posts() ?>
	<?php endif; // eb_articles_visible ?>

	<!-- â•â• LEAD MAGNET â•â• -->
	<?php if ( get_theme_mod( 'eb_lm_visible', '1' ) ) : ?>
	<section class="lm rev" aria-labelledby="lm-heading">
		<div class="wrap">
			<div class="lm-card">
				<div class="lm-grid-bg" aria-hidden="true"></div>
				<div class="lm-body">
					<p class="lm-ey" aria-hidden="true"><?php echo esc_html( get_theme_mod( 'eb_lm_eyebrow', 'Free Download' ) ); ?></p>
					<h2 id="lm-heading" class="lm-t"><?php echo eb_customizer_text( 'eb_lm_headline', 'The [eb_highlight]Brain Stack[/eb_highlight] - 11 nutrients your brain actually needs.' ); ?></h2>
					<p class="lm-d"><?php echo esc_html( get_theme_mod( 'eb_lm_desc', 'Science-backed breakdown of 11 core brain nutrients for focus, memory, mental clarity, and long-term health. Explained simply, no hype.' ) ); ?></p>
					<?php
					$_bullet_defaults = [ 1 => 'What each nutrient does in the brain', 2 => 'Why it matters for high performance', 3 => 'Food sources and supplementation guidance', 4 => 'Backed by peer-reviewed human trials' ];
					$bullets = [];
					for ( $i = 1; $i <= 4; $i++ ) {
						$b = get_theme_mod( "eb_lm_bullet_{$i}", $_bullet_defaults[$i] );
						if ( $b ) $bullets[] = $b;
					}
					if ( $bullets ) :
					?>
					<ul class="lm-ul">
						<?php foreach ( $bullets as $b ) : ?>
						<li><?php echo esc_html( $b ); ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<a href="<?php echo esc_url( get_theme_mod( 'eb_lm_btn_url', 'https://www.instagram.com/enhancingbrain' ) ); ?>"
					   target="_blank" rel="noopener noreferrer" class="lm-btn">
						<?php echo esc_html( get_theme_mod( 'eb_lm_btn_text', 'Comment "STACK" on Instagram →' ) ); ?>
					</a>
				</div>
				<div class="lm-vis" aria-hidden="true">
					<div class="lm-pc">
						<div class="lm-pt">The Brain Stack</div>
						<div class="lm-ps">11 core nutrients</div>
						<div class="lm-ns">
							<div class="lm-n">Omega-3 DHA<div class="lm-b"><div class="lm-bf" style="width:90%"></div></div></div>
							<div class="lm-n">Lion's Mane<div class="lm-b"><div class="lm-bf" style="width:75%"></div></div></div>
							<div class="lm-n">Bacopa<div class="lm-b"><div class="lm-bf" style="width:80%"></div></div></div>
							<div class="lm-n">Magnesium<div class="lm-b"><div class="lm-bf" style="width:85%"></div></div></div>
							<div class="lm-n">+ 7 more...<div class="lm-b"><div class="lm-bf" style="width:100%"></div></div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- â•â• TOPICS â•â• -->
	<?php if ( get_theme_mod( 'eb_topics_visible', '1' ) ) : ?>
	<section class="topics rev" aria-labelledby="topics-heading">
		<div class="wrap">
			<div class="sh">
				<div class="sh-left">
					<span class="sh-ey" aria-hidden="true"><?php echo esc_html( get_theme_mod( 'eb_topics_eyebrow', 'Blog' ) ); ?></span>
					<h2 id="topics-heading" class="sh-t"><?php echo esc_html( get_theme_mod( 'eb_topics_heading', 'Browse Articles by Topic' ) ); ?></h2>
				</div>
				<a href="<?php echo esc_url( home_url( '/articles' ) ); ?>" class="sh-link">
					<?php echo esc_html( get_theme_mod( 'eb_topics_link', 'View all articles →' ) ); ?>
				</a>
			</div>
			<div class="tgrid">
				<?php
				$topic_cats = get_categories( [ 'hide_empty' => false, 'number' => 8 ] );
				$icons = [
				'brain-health-longevity' => '&#x1F9E0;',
				'focus-productivity' => '&#x1F3AF;',
				'memory-learning' => '&#x1F9E9;',
				'nootropics-supplements' => '&#x1F48A;',
			];
			foreach ( $topic_cats as $i => $cat ) :
					$count = absint( $cat->count ) . ' ' . _n( 'article', 'articles', $cat->count, 'enhancingbrain' );
				?>
				<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" class="tc">
					<span class="tc-icon" aria-hidden="true"><?php echo wp_kses_post( $icons[ $cat->slug ] ?? '&#x1F4D6;' ); ?></span>
					<span class="tc-n"><?php echo esc_html( $cat->name ); ?></span>
					<?php if ( $cat->description ) : ?>
					<span class="tc-d"><?php echo esc_html( $cat->description ); ?></span>
					<?php endif; ?>
					<span class="tc-c"><?php echo esc_html( $count ); ?></span>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; // eb_topics_visible ?>

</main>

<?php get_footer(); ?>



