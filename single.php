<?php get_header(); ?>

<main id="main-content" class="single-post">
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'eb-article' ); ?> itemscope itemtype="https://schema.org/Article">
		<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"/>
		<meta itemprop="dateModified"  content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"/>
		<meta itemprop="author"        content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>

		<!-- Hero image -->
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="single-thumb">
			<?php the_post_thumbnail( 'eb-hero', [
				'loading' => 'eager',
				'decoding'=> 'async',
				'itemprop'=> 'image',
				'alt'     => esc_attr( get_the_title() ),
			] ); ?>
		</div>
		<?php endif; ?>

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
					<li aria-current="page"><?php the_title(); ?></li>
				</ol>
			</nav>

			<header class="single-header">
				<!-- Category -->
				<?php $cats = get_the_category(); if ( $cats ) : ?>
				<a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>" class="c-mc single-cat"><?php echo esc_html( $cats[0]->name ); ?></a>
				<?php endif; ?>

				<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>

				<div class="single-meta">
					<span class="single-rt"><?php echo esc_html( eb_primary_category_name() ); ?></span>
					<span class="single-sep" aria-hidden="true">-</span>
					<span class="single-date">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					</span>
				</div>
			</header>

			<!-- Disclaimer -->
			<aside class="eb-disclaimer" role="note">
				<p><?php echo esc_html( get_theme_mod( 'eb_disclaimer_text', 'The information in this article is for educational purposes only and is not medical advice. Always consult a qualified healthcare professional before making changes to your health.' ) ); ?></p>
			</aside>

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
							<?php echo eb_category_badge(); ?>
						</div>
						<?php endif; ?>
						<div class="c-body">
							<div class="c-meta" aria-hidden="true">
								<?php $rc = get_the_category(); if ( $rc ) echo '<span class="c-mc">' . esc_html( $rc[0]->name ) . '</span>'; ?>
							</div>
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
