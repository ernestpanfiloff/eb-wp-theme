<?php get_header(); ?>

<main id="main-content" class="single-post">
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'eb-article' ); ?> itemscope itemtype="https://schema.org/Article">
		<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"/>
		<meta itemprop="dateModified"  content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"/>
		<meta itemprop="author"        content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

		<div class="wrap single-wrap">

			<!-- Breadcrumbs -->
			<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'enhancingbrain' ); ?>">
				<ol>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'enhancingbrain' ); ?></a></li>
					<?php $cats = get_the_category(); if ( $cats ) : ?>
					<li aria-hidden="true">></li>
					<li><a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>"><?php echo esc_html( $cats[0]->name ); ?></a></li>
					<?php endif; ?>
					<li aria-hidden="true">></li>
					<li aria-current="page"><span class="sr-only"><?php the_title(); ?></span><span aria-hidden="true">...</span></li>
				</ol>
			</nav>

			<header class="single-header">
				<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>

				<?php
				$word_count = str_word_count( wp_strip_all_tags( get_post_field( 'post_content', get_the_ID() ) ) );
				$read_time  = max( 1, (int) ceil( $word_count / 200 ) );
				?>
				<div class="single-meta">
					<span class="meta-item">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
						<time class="single-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</span>
					<span class="single-sep" aria-hidden="true">-</span>
					<span class="meta-item">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><polyline points="12,7 12,12 15,14"/></svg>
						<span class="single-rt"><?php echo esc_html( $read_time . ' min read' ); ?></span>
					</span>
				</div>
			</header>

			<!-- Content -->
			<div class="single-content entry-content" itemprop="articleBody">
				<?php the_content(); ?>
				<?php
				wp_link_pages( [
					'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Post pages', 'enhancingbrain' ) . '"><span>' . __( 'Pages:', 'enhancingbrain' ) . '</span>',
					'after'  => '</nav>',
				] );
				?>
			</div>

			<!-- Tags -->
			<?php $tags = get_the_tags(); if ( $tags ) : ?>
			<div class="single-tags">
				<?php foreach ( $tags as $tag ) : ?>
				<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="band-tag"><?php echo esc_html( $tag->name ); ?></a>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<!-- Related posts -->
			<?php
			$related = new WP_Query( [
				'posts_per_page'      => 3,
				'post__not_in'        => [ get_the_ID() ],
				'category__in'        => wp_get_post_categories( get_the_ID() ),
				'post_status'         => 'publish',
				'orderby'             => 'rand',
				'no_found_rows'       => true,
				'ignore_sticky_posts' => true,
			] );
			if ( $related->have_posts() ) :
			?>
			<section class="related-posts" aria-labelledby="related-heading">
				<h2 id="related-heading" class="related-title"><?php esc_html_e( 'Related Articles', 'enhancingbrain' ); ?></h2>
				<div class="grid3">
					<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<article class="card card-sm">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="c-thumb">
							<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<?php the_post_thumbnail( 'eb-card', [ 'loading' => 'lazy', 'decoding' => 'async', 'alt' => esc_attr( get_the_title() ) ] ); ?>
							</a>
						</div>
						<?php endif; ?>
						<div class="c-body">
							<h3 class="c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="c-foot">
								<span class="c-rt"><?php echo esc_html( eb_primary_category_name() ); ?></span>
								<a href="<?php the_permalink(); ?>" class="c-rm" aria-label="<?php printf( esc_attr__( 'Read: %s', 'enhancingbrain' ), esc_attr( get_the_title() ) ); ?>"><?php esc_html_e( 'Read →', 'enhancingbrain' ); ?></a>
							</div>
						</div>
					</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
			<?php endif; ?>

		</div>
	</article>

<?php endwhile; ?>
</main>

<?php get_footer(); ?>
