<footer id="site-footer">
	<div class="ft-main">

		<!-- Brand column -->
		<div class="ft-brand">
			<?php echo eb_logo_html( 'ft-logo' ); ?>
			<p class="ft-tag"><?php echo esc_html( get_theme_mod( 'eb_footer_tagline', 'Neuroscience for high performers. Peer-reviewed research translated into what actually matters.' ) ); ?></p>

			<?php if ( get_theme_mod( 'eb_footer_show_disclaimer', '1' ) ) : ?>
			<p class="ft-dis"><?php echo esc_html( get_theme_mod( 'eb_disclaimer_text', 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.' ) ); ?></p>
			<?php endif; ?>

			<div class="ft-soc">
				<?php
				$socials = [
					[ get_theme_mod( 'eb_footer_ig_url', 'https://www.instagram.com/enhancingbrain' ), 'instagram', 'Instagram' ],
					[ get_theme_mod( 'eb_footer_yt_url', '' ), 'youtube', 'YouTube'    ],
					[ get_theme_mod( 'eb_footer_x_url',  '' ), 'x',  'X/Twitter'  ],
				];
				foreach ( $socials as [ $url, $icon, $label ] ) :
					if ( $url ) :
				?>
				<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="s-btn"
				   aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' on ' . $label ); ?>">
					<?php if ( 'instagram' === $icon ) : ?>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false">
						<rect x="2.5" y="2.5" width="19" height="19" rx="5"></rect>
						<circle cx="12" cy="12" r="4.2"></circle>
						<circle cx="18" cy="6" r="1"></circle>
					</svg>
					<?php elseif ( 'youtube' === $icon ) : ?>
					<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
						<path d="M21.6 7.2a2.8 2.8 0 0 0-2-2C17.9 4.7 12 4.7 12 4.7s-5.9 0-7.6.5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 2 12a29 29 0 0 0 .4 4.8 2.8 2.8 0 0 0 2 2c1.7.5 7.6.5 7.6.5s5.9 0 7.6-.5a2.8 2.8 0 0 0 2-2A29 29 0 0 0 22 12a29 29 0 0 0-.4-4.8ZM10 15.6V8.4l6 3.6-6 3.6Z"></path>
					</svg>
					<?php else : ?>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false">
						<path d="M18.9 2H22l-6.8 7.8L23 22h-6.1l-4.8-6.6L6.3 22H3.2l7.2-8.2L1 2h6.2l4.3 6 5.4-6Zm-1.1 18h1.7L6.3 3.9H4.5L17.8 20Z"></path>
					</svg>
					<?php endif; ?>
				</a>
				<?php endif; endforeach; ?>
			</div>
		</div>

		<!-- Content column -->
		<?php if ( get_theme_mod( 'eb_footer_show_content_col', '1' ) ) : ?>
		<div class="ft-col">
			<h2 class="ft-col-title"><?php echo esc_html( get_theme_mod( 'eb_footer_col1_heading', 'Blog Categories' ) ); ?></h2>
			<ul>
				<?php
				$links = eb_parse_menu_items( get_theme_mod( 'eb_footer_col1_links',
					"Brain Health | /category/brain-health-longevity\nFocus & Productivity | /category/focus-productivity\nMemory & Learning | /category/memory-learning\nNootropics | /category/nootropics-supplements"
				) );
				$links = array_values( array_filter( $links, function( $link ) {
					return strtolower( trim( (string) ( $link['label'] ?? '' ) ) ) !== 'blog';
				} ) );
				foreach ( $links as $link ) :
				?>
				<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<!-- Resources column -->
		<?php if ( get_theme_mod( 'eb_footer_show_resources_col', '1' ) ) : ?>
		<div class="ft-col">
			<h2 class="ft-col-title"><?php echo esc_html( get_theme_mod( 'eb_footer_col2_heading', 'Resources' ) ); ?></h2>
			<ul>
				<?php
				$links = eb_parse_menu_items( get_theme_mod( 'eb_footer_col2_links',
					"The Brain Stack (Free) | https://www.instagram.com/enhancingbrain\nNewsletter | /#newsletter\nAbout | /about\nStyle Guide | /style-guide"
				) );
				foreach ( $links as $link ) :
				?>
				<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

		<!-- Research From column -->
		<?php if ( get_theme_mod( 'eb_footer_show_research_col', '1' ) ) : ?>
		<div class="ft-col">
			<?php
			$col3_heading = (string) get_theme_mod( 'eb_footer_col3_heading', 'Company & Legal' );
			if ( strtolower( trim( $col3_heading ) ) === 'research' ) {
				$col3_heading = 'Company & Legal';
			}
			?>
			<h2 class="ft-col-title"><?php echo esc_html( $col3_heading ); ?></h2>
			<ul>
				<?php
				$legacy_default = "PubMed | https://pubmed.ncbi.nlm.nih.gov\nNIH | https://www.nih.gov\nNature Neuroscience | https://www.nature.com/neuro\nHuberman Lab | https://hubermanlab.com";
				$new_default    = "About | /about\nContact | /contact\nAffiliate Disclaimer | /affiliate-disclaimer\nPrivacy Policy | /privacy-policy\nTerms & Conditions | /terms-and-conditions";
				$raw_links      = get_theme_mod( 'eb_footer_col3_links', $new_default );
				if ( trim( (string) $raw_links ) === trim( $legacy_default ) ) {
					$raw_links = $new_default;
				}
				$links = eb_parse_menu_items( $raw_links );
				$has_affiliate_disclaimer = false;
				$has_privacy_policy = false;
				foreach ( $links as $link ) :
					$link_label = strtolower( trim( (string) ( $link['label'] ?? '' ) ) );
					$link_url   = strtolower( trim( (string) ( $link['url'] ?? '' ) ) );
					if ( strpos( $link_label, 'affiliate disclaimer' ) !== false || strpos( $link_url, '/affiliate-disclaimer' ) !== false ) {
						$has_affiliate_disclaimer = true;
					}
					if ( strpos( $link_label, 'privacy policy' ) !== false || strpos( $link_url, '/privacy-policy' ) !== false ) {
						$has_privacy_policy = true;
					}
				?>
				<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
				<?php endforeach; ?>
				<?php if ( ! $has_privacy_policy ) : ?>
				<li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'enhancingbrain' ); ?></a></li>
				<?php endif; ?>
				<?php if ( ! $has_affiliate_disclaimer ) : ?>
				<li><a href="<?php echo esc_url( home_url( '/affiliate-disclaimer' ) ); ?>"><?php esc_html_e( 'Affiliate Disclaimer', 'enhancingbrain' ); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<?php endif; ?>

	</div><!-- /.ft-main -->

	<div class="ft-bot">
		<p class="ft-copy"><?php echo esc_html( get_theme_mod( 'eb_footer_copyright', '(c) ' . gmdate( 'Y' ) . ' Enhancing Brain. All rights reserved.' ) ); ?></p>
		<?php if ( get_theme_mod( 'eb_footer_show_disclaimer_pill', '1' ) ) : ?>
		<span class="ft-pill"><?php echo esc_html( get_theme_mod( 'eb_footer_disclaimer_pill_text', 'Not a doctor - Educational use only' ) ); ?></span>
		<?php endif; ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
