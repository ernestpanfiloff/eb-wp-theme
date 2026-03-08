<?php
/**
 * Fallback index - WordPress requires this file.
 * Redirects to archive for posts, or shows posts list.
 */
get_header();
?>
<main id="main-content">
	<div class="wrap">
		<?php if ( have_posts() ) : ?>
		<div class="grid3">
			<?php while ( have_posts() ) : the_post(); ?>
			<article class="card card-sm">
				<?php if ( has_post_thumbnail() ) : ?>
				<div class="c-thumb">
					<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'eb-card', [ 'loading' => 'lazy', 'alt' => esc_attr( get_the_title() ) ] ); ?>
					</a>
				</div>
				<?php endif; ?>
				<div class="c-body">
					<h2 class="c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="c-exc"><?php the_excerpt(); ?></p>
					<div class="c-foot">
						<span class="c-rt"><?php echo esc_html( eb_primary_category_name( get_the_ID() ) ); ?></span>
						<a href="<?php the_permalink(); ?>" class="c-rm"><?php esc_html_e( 'Read →', 'enhancingbrain' ); ?></a>
					</div>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
		<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'enhancingbrain' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
