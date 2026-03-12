<?php get_header(); ?>

<main id="main-content" class="archive-page">
	<div class="wrap">

		<!-- Breadcrumbs -->
		<nav class="breadcrumbs" aria-label="<?php esc_attr_e( 'Breadcrumb', 'enhancingbrain' ); ?>">
			<ol>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'enhancingbrain' ); ?></a></li>
				<li aria-hidden="true">></li>
				<li aria-current="page"><span class="sr-only"><?php echo esc_html( is_category() ? single_cat_title( '', false ) : get_the_archive_title() ); ?></span><span aria-hidden="true">...</span></li>
			</ol>
		</nav>

		<!-- Archive header -->
		<header class="archive-header">
			<div class="sh">
				<div class="sh-left">
					<span class="sh-ey" aria-hidden="true">
						<?php echo is_category() ? esc_html__( 'Category', 'enhancingbrain' ) : esc_html__( 'Archive', 'enhancingbrain' ); ?>
					</span>
					<h1 class="sh-t"><?php echo esc_html( is_category() ? single_cat_title( '', false ) : get_the_archive_title() ); ?></h1>
				</div>
			</div>
			<?php eb_archive_description(); ?>
		</header>

		<!-- Category filter pills (only on category archives) -->
		<?php if ( is_category() ) :
			$all_cats = get_categories( [ 'hide_empty' => false ] );
			if ( $all_cats ) :
		?>
		<nav class="cat-filter" aria-label="<?php esc_attr_e( 'Filter by category', 'enhancingbrain' ); ?>">
			<?php foreach ( $all_cats as $cat ) : ?>
			<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
			   class="band-tag <?php echo is_category( $cat->term_id ) ? 'active' : ''; ?>">
				<?php echo esc_html( $cat->name ); ?>
			</a>
			<?php endforeach; ?>
		</nav>
		<?php endif; endif; ?>

		<!-- Posts grid -->
		<?php if ( have_posts() ) : ?>
		<div class="archive-grid grid3">
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="card card-sm" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="c-thumb">
					<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'eb-card', [ 'loading' => 'lazy', 'decoding' => 'async', 'alt' => esc_attr( get_the_title() ) ] ); ?>
					</a>
				</div>
				<?php endif; ?>
				<div class="c-body">
					<h2 class="c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="c-exc"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<div class="c-foot">
						<span class="c-rt"><?php echo esc_html( eb_primary_category_name() ); ?></span>
						<a href="<?php the_permalink(); ?>" class="c-rm" aria-label="<?php printf( esc_attr__( 'Read: %s', 'enhancingbrain' ), esc_attr( get_the_title() ) ); ?>"><?php esc_html_e( 'Read ->', 'enhancingbrain' ); ?></a>
					</div>
				</div>
			</article>
			<?php endwhile; ?>
		</div>

		<!-- Pagination -->
		<nav class="eb-pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'enhancingbrain' ); ?>">
			<?php
			the_posts_pagination( [
				'mid_size'  => 2,
				'prev_text' => __( '<- Previous', 'enhancingbrain' ),
				'next_text' => __( 'Next ->', 'enhancingbrain' ),
			] );
			?>
		</nav>

		<?php else : ?>
		<div class="no-posts">
			<p><?php esc_html_e( 'No articles found. Check back soon.', 'enhancingbrain' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="f-btn cta-inline-btn"><?php esc_html_e( '<- Back to Home', 'enhancingbrain' ); ?></a>
		</div>
		<?php endif; ?>

	</div>
</main>

<?php get_footer(); ?>
