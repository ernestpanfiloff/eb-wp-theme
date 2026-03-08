<?php
/**
 * Enhancing Brain — Functions
 */

defined( 'ABSPATH' ) || exit;

define( 'EB_DIR', get_template_directory() );
define( 'EB_URI', get_template_directory_uri() );

/* ══════════════════════════════════════════
   THEME SETUP
══════════════════════════════════════════ */
function eb_setup() {
	load_theme_textdomain( 'enhancingbrain', EB_DIR . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-color-palette', [
		[ 'name' => __( 'Accent Green', 'enhancingbrain' ), 'slug' => 'accent', 'color' => '#0bbf96' ],
		[ 'name' => __( 'Ink',          'enhancingbrain' ), 'slug' => 'ink',    'color' => '#0e1420' ],
	] );
	add_image_size( 'eb-featured',   900, 550, true );
	add_image_size( 'eb-card',       600, 400, true );
	add_image_size( 'eb-card-thumb', 260, 200, true );
	add_image_size( 'eb-hero',      1200, 630, true );

	/* JSON-LD — structured data */
	add_action( 'wp_head', function() {
		$data = [
			'@context' => 'https://schema.org',
			'@type'    => 'WebSite',
			'name'     => get_bloginfo( 'name' ),
			'url'      => home_url( '/' ),
		];
		echo '<script type="application/ld+json">' . wp_json_encode( $data ) . '</script>' . "\n";
	}, 1 );
}
add_action( 'after_setup_theme', 'eb_setup' );

/* ══════════════════════════════════════════
   ENQUEUE
══════════════════════════════════════════ */
function eb_enqueue_assets() {
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style(  'eb-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=DM+Mono:wght@400&family=Playfair+Display:ital,wght@1,700&display=swap', [], null );
	wp_enqueue_style(  'eb-main',  EB_URI . '/assets/css/main.css', [ 'eb-fonts' ], $ver );
	wp_enqueue_script( 'eb-main',  EB_URI . '/assets/js/main.js',   [], $ver, true );
}
add_action( 'wp_enqueue_scripts', 'eb_enqueue_assets' );

function eb_preconnect_fonts( $hints, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$hints[] = [ 'href' => 'https://fonts.googleapis.com' ];
		$hints[] = [ 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' ];
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'eb_preconnect_fonts', 10, 2 );

function eb_customizer_preview_js() {
	wp_enqueue_script( 'eb-customizer-preview', EB_URI . '/assets/js/customizer-preview.js', [ 'customize-preview' ], null, true );
}
add_action( 'customize_preview_init', 'eb_customizer_preview_js' );

/* ══════════════════════════════════════════
   SHORTCODES
══════════════════════════════════════════ */
function eb_highlight_shortcode( $atts, $content = '' ) {
	return '<mark class="eb-hi">' . wp_kses_post( $content ) . '</mark>';
}
add_shortcode( 'eb_highlight', 'eb_highlight_shortcode' );

function eb_disclaimer_shortcode( $atts ) {
	$text = get_theme_mod( 'eb_disclaimer_text', 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.' );
	return '<aside class="eb-disclaimer" role="note"><p>' . esc_html( $text ) . '</p></aside>';
}
add_shortcode( 'eb_disclaimer', 'eb_disclaimer_shortcode' );

/* ══════════════════════════════════════════
   HELPERS
══════════════════════════════════════════ */
/** Output customizer text — processes [eb_highlight] shortcodes */
function eb_customizer_text( $mod_key, $default = '' ) {
	return do_shortcode( wp_kses_post( get_theme_mod( $mod_key, $default ) ) );
}

/** Read time estimate */
function eb_read_time( $post_id = null ) {
	$content    = get_post_field( 'post_content', $post_id ?: get_the_ID() );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	return max( 1, (int) round( $word_count / 200 ) );
}

/** Category badge (dark pill) — renders in .c-body above the title */
function eb_category_badge( $post_id = null ) {
	$cats = get_the_category( $post_id ?: get_the_ID() );
	if ( ! $cats ) return '';
	return '<span class="c-cat" aria-hidden="true">' . esc_html( $cats[0]->name ) . '</span>';
}

function eb_archive_description() {
	$desc = get_queried_object() ? get_queried_object()->description ?? '' : '';
	if ( $desc ) echo '<div class="archive-description">' . wp_kses_post( $desc ) . '</div>';
}

function eb_body_classes( $classes ) {
	if ( is_singular() ) $classes[] = 'is-singular';
	return $classes;
}
add_filter( 'body_class', 'eb_body_classes' );

function eb_excerpt_length( $length ) { return 22; }
add_filter( 'excerpt_length', 'eb_excerpt_length' );
function eb_excerpt_more( $more ) { return '…'; }
add_filter( 'excerpt_more', 'eb_excerpt_more' );

/* ══════════════════════════════════════════
   BLOCK EDITOR
══════════════════════════════════════════ */
function eb_block_editor_assets() {
	wp_enqueue_script(
		'eb-editor-formats',
		EB_URI . '/assets/js/editor-formats.js',
		[ 'wp-rich-text', 'wp-element', 'wp-editor' ],
		null, true
	);
}
add_action( 'enqueue_block_editor_assets', 'eb_block_editor_assets' );

function eb_editor_styles() {
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'eb_editor_styles' );

/* ══════════════════════════════════════════
   LOGO HELPER
══════════════════════════════════════════ */
/**
 * Render site logo with "Brain" highlighted in accent colour.
 * @param string $extra_class  Additional CSS class(es) added alongside 'logo'.
 */
function eb_logo_html( $extra_class = '' ) {
	$name   = get_bloginfo( 'name' );
	$class  = trim( 'logo ' . $extra_class );
	$inner  = strpos( $name, 'Brain' ) !== false
		? str_replace( 'Brain', '<span class="a">Brain</span>', esc_html( $name ) )
		: esc_html( $name );
	return '<a href="' . esc_url( home_url( '/' ) ) . '" class="' . esc_attr( $class ) . '" aria-label="' . esc_attr( $name . ' — ' . __( 'Home', 'enhancingbrain' ) ) . '">' . $inner . '</a>';
}

/* ══════════════════════════════════════════
   CUSTOMIZER NAV MENU PARSER
   Format (one item per line):
     Label | /url
       Sub Label | /sub-url     (indent 2+ spaces = child item)
══════════════════════════════════════════ */
function eb_parse_menu( $text ) {
	$items     = [];
	$top_index = -1;
	foreach ( explode( "\n", $text ) as $raw ) {
		if ( trim( $raw ) === '' ) continue;
		$is_child = ( strlen( $raw ) > 0 && ( $raw[0] === ' ' || $raw[0] === "\t" ) );
		$line     = trim( $raw );
		$parts    = explode( '|', $line, 2 );
		$label    = trim( $parts[0] );
		$url      = isset( $parts[1] ) ? trim( $parts[1] ) : '#';
		if ( ! $label ) continue;

		if ( $is_child && $top_index >= 0 ) {
			$items[ $top_index ]['children'][] = [ 'label' => $label, 'url' => $url ];
		} else {
			$items[]   = [ 'label' => $label, 'url' => $url, 'children' => [] ];
			$top_index = count( $items ) - 1;
		}
	}
	return $items;
}

/** Render nav <ul> from parsed items. $depth: 0 = top-level, 1 = dropdown */
function eb_render_nav_ul( array $items, $depth = 0 ) {
	if ( empty( $items ) ) return;
	$current_url = home_url( add_query_arg( null, null ) );
	if ( $depth === 0 ) echo '<ul class="nav-links" role="list">';
	foreach ( $items as $item ) {
		$url      = esc_url( $item['url'] );
		$label    = esc_html( $item['label'] );
		$has_sub  = ! empty( $item['children'] );
		$active   = ( trailingslashit( $current_url ) === trailingslashit( home_url( $item['url'] ) ) );
		$cur_attr = $active ? ' aria-current="page"' : '';

		if ( $depth === 0 ) {
			echo '<li>';
			if ( $has_sub ) {
				echo '<a href="' . $url . '"' . $cur_attr . ' aria-haspopup="true" aria-expanded="false">'
					. $label
					. '<span class="nav-arrow" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" focusable="false"><polyline points="5 8 10 13 15 8"/></svg></span>'
					. '</a>';
				echo '<div class="nav-dd" role="menu">';
				foreach ( $item['children'] as $child ) {
					echo '<a href="' . esc_url( $child['url'] ) . '" role="menuitem">' . esc_html( $child['label'] ) . '</a>';
				}
				echo '</div>';
			} else {
				echo '<a href="' . $url . '"' . $cur_attr . '>' . $label . '</a>';
			}
			echo '</li>';
		}
	}
	if ( $depth === 0 ) echo '</ul>';
}

/* ══════════════════════════════════════════
   LOAD CUSTOMIZER + SAMPLE DATA
══════════════════════════════════════════ */
require_once EB_DIR . '/inc/customizer.php';
require_once EB_DIR . '/inc/sample-data.php';

/**
 * Parse nav/footer link textarea.
 * Format: "Label | /url" — one per line.
 * Sub-items (for dropdown) prefixed with 2 spaces: "  Sub Label | /url"
 * Returns [ ['label'=>'', 'url'=>'', 'children'=>[...]], ... ]
 */
function eb_parse_menu_items( string $raw ): array {
	$items  = [];
	$parent = null;
	foreach ( explode( "\n", $raw ) as $line ) {
		$line = rtrim( $line );
		if ( $line === '' ) continue;
		$is_child = ( strpos( $line, '  ' ) === 0 ); // 2-space indent = sub-item
		$line     = trim( $line );
		if ( strpos( $line, '|' ) === false ) continue; // skip malformed lines
		[ $label, $url ] = array_map( 'trim', explode( '|', $line, 2 ) );
		if ( $label === '' ) continue;
		if ( $is_child && $parent !== null ) {
			$items[ $parent ]['children'][] = [ 'label' => $label, 'url' => $url ];
		} else {
			$items[] = [ 'label' => $label, 'url' => $url, 'children' => [] ];
			$parent  = array_key_last( $items );
		}
	}
	return $items;
}

/**
 * Render primary nav menu from Customizer OR fall back to wp_nav_menu.
 */
function eb_render_primary_nav( string $ul_class = 'nav-links' ): void {
	$raw = get_theme_mod( 'eb_nav_items', "Home | /\nArticles | /articles\nAbout | /about" );
	if ( trim( $raw ) === '' ) {
		// Fallback to WP menu
		wp_nav_menu( [ 'theme_location' => 'primary', 'container' => false, 'items_wrap' => '<ul class="' . esc_attr( $ul_class ) . '" role="list">%3$s</ul>' ] );
		return;
	}
	$items   = eb_parse_menu_items( $raw );
	$current = $_SERVER['REQUEST_URI'] ?? '';
	echo '<ul class="' . esc_attr( $ul_class ) . '" role="list">';
	foreach ( $items as $item ) {
		$has_sub = ! empty( $item['children'] );
		$is_cur  = ( $item['url'] !== '/' && $item['url'] !== '#' && strpos( $current, $item['url'] ) === 0 )
		           || ( $item['url'] === '/' && ( $current === '/' || $current === '' ) );
		$classes = $has_sub ? 'menu-item-has-children' : '';
		echo '<li' . ( $classes ? ' class="' . esc_attr( $classes ) . '"' : '' ) . '>';
		echo '<a href="' . esc_url( $item['url'] ) . '"'
			. ( $is_cur ? ' aria-current="page"' : '' )
			. ( $has_sub ? ' aria-haspopup="true" aria-expanded="false"' : '' ) . '>'
			. esc_html( $item['label'] );
		if ( $has_sub ) {
			echo '<span class="nav-arrow" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" focusable="false"><polyline points="5 8 10 13 15 8"/></svg></span>';
		}
		echo '</a>';
		if ( $has_sub ) {
			echo '<div class="nav-dd" role="menu">';
			foreach ( $item['children'] as $child ) {
				$child_cur = strpos( $current, $child['url'] ) === 0;
				echo '<a href="' . esc_url( $child['url'] ) . '" role="menuitem"' . ( $child_cur ? ' aria-current="page"' : '' ) . '>' . esc_html( $child['label'] ) . '</a>';
			}
			echo '</div>';
		}
		echo '</li>';
	}
	echo '</ul>';
}
