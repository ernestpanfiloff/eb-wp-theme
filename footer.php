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
					[ get_theme_mod( 'eb_footer_ig_url', 'https://www.instagram.com/enhancingbrain' ), 'IG', 'Instagram' ],
					[ get_theme_mod( 'eb_footer_yt_url', '' ), 'YT', 'YouTube'    ],
					[ get_theme_mod( 'eb_footer_x_url',  '' ), 'X',  'X/Twitter'  ],
				];
				foreach ( $socials as [ $url, $short, $label ] ) :
					if ( $url ) :
				?>
				<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="s-btn"
				   aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' on ' . $label ); ?>">
					<?php echo esc_html( $short ); ?>
				</a>
				<?php endif; endforeach; ?>
			</div>
		</div>

		<!-- Content column -->
		<?php if ( get_theme_mod( 'eb_footer_show_content_col', '1' ) ) : ?>
		<div class="ft-col">
			<h4><?php echo esc_html( get_theme_mod( 'eb_footer_col1_heading', 'Content' ) ); ?></h4>
			<ul>
				<?php
				$links = eb_parse_menu_items( get_theme_mod( 'eb_footer_col1_links',
					"All Articles | /articles\nBrain Health | /category/brain-health-longevity\nFocus & Productivity | /category/focus-productivity\nMemory & Learning | /category/memory-learning\nNootropics | /category/nootropics-supplements"
				) );
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
			<h4><?php echo esc_html( get_theme_mod( 'eb_footer_col2_heading', 'Resources' ) ); ?></h4>
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
			<h4><?php echo esc_html( get_theme_mod( 'eb_footer_col3_heading', 'Research From' ) ); ?></h4>
			<ul>
				<?php
				$links = eb_parse_menu_items( get_theme_mod( 'eb_footer_col3_links',
					"PubMed | https://pubmed.ncbi.nlm.nih.gov\nNIH | https://www.nih.gov\nNature Neuroscience | https://www.nature.com/neuro\nHuberman Lab | https://hubermanlab.com"
				) );
				foreach ( $links as $link ) :
				?>
				<li><a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $link['label'] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>

	</div><!-- /.ft-main -->

	<div class="ft-bot">
		<p class="ft-copy"><?php echo esc_html( get_theme_mod( 'eb_footer_copyright', '© ' . gmdate( 'Y' ) . ' Enhancing Brain. All rights reserved.' ) ); ?></p>
		<?php if ( get_theme_mod( 'eb_footer_show_disclaimer_pill', '1' ) ) : ?>
		<span class="ft-pill"><?php echo esc_html( get_theme_mod( 'eb_footer_disclaimer_pill_text', '⚠ Not a doctor · Educational use only' ) ); ?></span>
		<?php endif; ?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
