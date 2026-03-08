/**
 * Enhancing Brain — Customizer Preview JS
 * Uses postMessage transport for instant live preview (no page reload).
 */
( function( $ ) {
	'use strict';

	// Helper: update text content of a selector
	function liveText( settingId, selector ) {
		wp.customize( settingId, function( value ) {
			value.bind( function( newVal ) {
				$( selector ).text( newVal );
			} );
		} );
	}

	// Helper: update HTML (for shortcodes)
	function liveHtml( settingId, selector ) {
		wp.customize( settingId, function( value ) {
			value.bind( function( newVal ) {
				// Simple shortcode preview: replace [eb_highlight]...[/eb_highlight]
				var html = newVal.replace(
					/\[eb_highlight\](.*?)\[\/eb_highlight\]/g,
					'<mark class="eb-hi">$1</mark>'
				);
				$( selector ).html( html );
			} );
		} );
	}

	// Helper: update CSS custom property
	function liveColor( settingId, varName ) {
		wp.customize( settingId, function( value ) {
			value.bind( function( newVal ) {
				document.documentElement.style.setProperty( varName, newVal );
			} );
		} );
	}

	/* ── Colors ── */
	liveColor( 'eb_color_accent',    '--accent'    );
	liveColor( 'eb_color_accent_dk', '--accent-dk' );
	liveColor( 'eb_color_ink',       '--ink'       );
	liveColor( 'eb_color_muted',     '--muted'     );
	liveColor( 'eb_color_bg',        '--bg'        );

	/* ── Hero ── */
	liveText( 'eb_hero_eyebrow',    '.hero-eyebrow'    );
	liveHtml( 'eb_hero_headline',   '#hero-heading'    );
	liveText( 'eb_hero_subheadline','.hero-p'          );

	wp.customize( 'eb_hero_pills', function( value ) {
		value.bind( function( newVal ) {
			var pills = newVal.split( ',' ).map( function( p ) { return p.trim(); } ).filter( Boolean );
			var html  = pills.map( function( p ) { return '<span class="hero-pill">' + p + '</span>'; } ).join( '' );
			$( '.hero-pills' ).html( html );
		} );
	} );

	/* ── Newsletter card ── */
	liveText( 'eb_nl_label',      '.f-label'       );
	liveText( 'eb_nl_title',      '.f-title'       );
	liveText( 'eb_nl_desc',       '.f-desc'        );
	liveText( 'eb_nl_btn',        '.f-btn'         );
	liveText( 'eb_nl_disclaimer', '.f-disc'        );
	liveText( 'eb_nl_proof',      '.f-proof span'  );

	/* ── Stats ── */
	for ( var i = 1; i <= 4; i++ ) {
		( function( idx ) {
			liveText( 'eb_stat_' + idx + '_number', '.st:nth-child(' + idx + ') .st-n' );
			liveText( 'eb_stat_' + idx + '_label',  '.st:nth-child(' + idx + ') .st-l' );
		} )( i );
	}

	/* ── Articles ── */
	liveText( 'eb_articles_eyebrow',   '.articles .sh-ey'   );
	liveText( 'eb_articles_heading',   '#articles-heading'  );
	liveText( 'eb_articles_link_text', '.articles .sh-link' );

	/* ── Lead Magnet ── */
	liveText( 'eb_lm_eyebrow',  '.lm-ey'  );
	liveHtml( 'eb_lm_headline', '#lm-heading' );
	liveText( 'eb_lm_desc',     '.lm-d'   );
	liveText( 'eb_lm_btn_text', '.lm-btn' );

	/* ── Topics ── */
	liveText( 'eb_topics_eyebrow', '.topics .sh-ey'    );
	liveText( 'eb_topics_heading', '#topics-heading'   );
	liveText( 'eb_topics_link',    '.topics .sh-link'  );

	/* ── Footer ── */
	liveText( 'eb_footer_tagline',   '.ft-tag'  );
	liveText( 'eb_disclaimer_text',  '.ft-dis'  );
	liveText( 'eb_footer_copyright', '.ft-copy' );

	/* ── Typography ── */
	wp.customize( 'eb_base_font_size', function( value ) {
		value.bind( function( newVal ) {
			document.documentElement.style.fontSize = newVal + 'px';
		} );
	} );

	/* ── Site name ── */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newVal ) {
			$( '.logo, .ft-logo, .mob-menu-logo' ).each( function() {
				var parts = newVal.split( 'Brain' );
				if ( parts.length === 2 ) {
					$( this ).html( parts[0] + 'Brain<span class="a">' + parts[1] + '</span>' );
				} else {
					$( this ).text( newVal );
				}
			} );
		} );
	} );

} )( jQuery );
