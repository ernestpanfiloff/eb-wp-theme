<?php
/**
 * Enhancing Brain â€” Functions
 */

defined( 'ABSPATH' ) || exit;

define( 'EB_DIR', get_template_directory() );
define( 'EB_URI', get_template_directory_uri() );

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   THEME SETUP
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
function eb_setup() {
	load_theme_textdomain( 'enhancingbrain', EB_DIR . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'enhancingbrain' ),
	] );
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

	/* JSON-LD â€” structured data */
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

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   ENQUEUE
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
function eb_enqueue_assets() {
	$ver     = wp_get_theme()->get( 'Version' );
	$css_ver = file_exists( EB_DIR . '/assets/css/main.css' ) ? (string) filemtime( EB_DIR . '/assets/css/main.css' ) : $ver;
	$js_ver  = file_exists( EB_DIR . '/assets/js/main.js' )   ? (string) filemtime( EB_DIR . '/assets/js/main.js' )   : $ver;
	wp_enqueue_style(  'eb-fonts', 'https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=DM+Mono:wght@400&family=Playfair+Display:ital,wght@1,700&display=swap', [], null );
	wp_enqueue_style(  'eb-main',  EB_URI . '/assets/css/main.css', [ 'eb-fonts' ], $css_ver );
	wp_enqueue_script( 'eb-main',  EB_URI . '/assets/js/main.js',   [], $js_ver, true );
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

/**
 * Output a sane meta description fallback when no SEO plugin is handling it.
 */
function eb_output_meta_description() {
	if ( is_admin() ) {
		return;
	}

	// Avoid duplicate descriptions when common SEO plugins are active.
	if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'AIOSEO_VERSION' ) ) {
		return;
	}

	$desc = '';

	if ( is_front_page() || is_home() ) {
		$desc = get_bloginfo( 'description' );
	} elseif ( is_singular() ) {
		$desc = get_the_excerpt();
		if ( ! $desc ) {
			$post_id = get_queried_object_id();
			$content = $post_id ? get_post_field( 'post_content', $post_id ) : '';
			$desc    = wp_trim_words( wp_strip_all_tags( (string) $content ), 30, '' );
		}
	} elseif ( is_category() || is_tag() || is_tax() ) {
		$desc = wp_strip_all_tags( term_description() );
	} else {
		$desc = get_bloginfo( 'description' );
	}

	$desc = trim( wp_strip_all_tags( (string) $desc ) );
	if ( $desc !== '' ) {
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'eb_output_meta_description', 2 );

function eb_customizer_preview_js() {
	wp_enqueue_script( 'eb-customizer-preview', EB_URI . '/assets/js/customizer-preview.js', [ 'customize-preview' ], null, true );
}
add_action( 'customize_preview_init', 'eb_customizer_preview_js' );

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   SHORTCODES
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
function eb_highlight_shortcode( $atts, $content = '' ) {
	return '<mark class="eb-hi">' . wp_kses_post( $content ) . '</mark>';
}
add_shortcode( 'eb_highlight', 'eb_highlight_shortcode' );

function eb_disclaimer_shortcode( $atts ) {
	$text = get_theme_mod( 'eb_disclaimer_text', 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.' );
	return '<aside class="callout callout--warn" role="note"><p>' . esc_html( $text ) . '</p></aside>';
}
add_shortcode( 'eb_disclaimer', 'eb_disclaimer_shortcode' );

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   HELPERS
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
/** Output customizer text â€” processes [eb_highlight] shortcodes */
function eb_customizer_text( $mod_key, $default = '' ) {
	return do_shortcode( wp_kses_post( get_theme_mod( $mod_key, $default ) ) );
}

/** Read time estimate */
function eb_read_time( $post_id = null ) {
	$content    = get_post_field( 'post_content', $post_id ?: get_the_ID() );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	return max( 1, (int) round( $word_count / 200 ) );
}

/** Category badge (dark pill) â€” renders in .c-body above the title */
function eb_category_badge( $post_id = null ) {
	$cats = get_the_category( $post_id ?: get_the_ID() );
	if ( ! $cats ) return '';
	return '<span class="c-cat" aria-hidden="true">' . esc_html( $cats[0]->name ) . '</span>';
}

function eb_archive_description() {
	$desc = get_queried_object() ? get_queried_object()->description ?? '' : '';
	if ( $desc ) echo '<div class="archive-description">' . wp_kses_post( $desc ) . '</div>';
}

/**
 * Canonical URL for the posts index ("All Articles") page.
 */
function eb_articles_url(): string {
	$posts_page_id = (int) get_option( 'page_for_posts' );
	if ( $posts_page_id > 0 ) {
		$link = get_permalink( $posts_page_id );
		if ( is_string( $link ) && $link !== '' ) {
			return $link;
		}
	}
	return home_url( '/articles' );
}

/**
 * Keep legacy /articles links working even if posts page slug changed.
 */
function eb_redirect_legacy_articles_slug(): void {
	if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
	$req_path    = wp_parse_url( home_url( $request_uri ), PHP_URL_PATH );
	$legacy_path = wp_parse_url( home_url( '/articles' ), PHP_URL_PATH );
	if ( ! is_string( $req_path ) || ! is_string( $legacy_path ) ) {
		return;
	}

	if ( trailingslashit( $req_path ) !== trailingslashit( $legacy_path ) ) {
		return;
	}

	$target      = eb_articles_url();
	$target_path = wp_parse_url( $target, PHP_URL_PATH );
	if ( ! is_string( $target_path ) ) {
		return;
	}

	if ( trailingslashit( $target_path ) === trailingslashit( $legacy_path ) ) {
		return;
	}

	wp_safe_redirect( $target, 301 );
	exit;
}
add_action( 'template_redirect', 'eb_redirect_legacy_articles_slug', 1 );

/**
 * Render legal templates for known slugs even if the WP Page was not created yet.
 */
function eb_legal_slug_template_fallback( $template ) {
	if ( is_admin() || ! is_404() ) {
		return $template;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/';
	$req_path    = wp_parse_url( home_url( $request_uri ), PHP_URL_PATH );
	if ( ! is_string( $req_path ) || $req_path === '' ) {
		return $template;
	}

	$map = [
		'/affiliate-disclaimer' => EB_DIR . '/page-affiliate-disclaimer.php',
		'/privacy-policy'       => EB_DIR . '/page-privacy-policy.php',
		'/terms-and-conditions' => EB_DIR . '/page-terms-and-conditions.php',
	];

	foreach ( $map as $slug => $file ) {
		$slug_path = wp_parse_url( home_url( $slug ), PHP_URL_PATH );
		if ( ! is_string( $slug_path ) ) {
			continue;
		}
		if ( trailingslashit( $req_path ) === trailingslashit( $slug_path ) && file_exists( $file ) ) {
			global $wp_query;
			$wp_query->is_404 = false;
			status_header( 200 );
			return $file;
		}
	}

	return $template;
}
add_filter( 'template_include', 'eb_legal_slug_template_fallback', 20 );

function eb_body_classes( $classes ) {
	if ( is_singular() ) $classes[] = 'is-singular';
	return $classes;
}
add_filter( 'body_class', 'eb_body_classes' );

function eb_excerpt_length( $length ) { return 22; }
add_filter( 'excerpt_length', 'eb_excerpt_length' );
function eb_excerpt_more( $more ) { return '...'; }
add_filter( 'excerpt_more', 'eb_excerpt_more' );

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   BLOCK EDITOR
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
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

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   LOGO HELPER
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
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
	return '<a href="' . esc_url( home_url( '/' ) ) . '" class="' . esc_attr( $class ) . '" aria-label="' . esc_attr( $name . ' - ' . __( 'Home', 'enhancingbrain' ) ) . '">' . $inner . '</a>';
}

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   CUSTOMIZER NAV MENU PARSER
   Format (one item per line):
     Label | /url
       Sub Label | /sub-url     (indent 2+ spaces = child item)
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
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
				echo '<a href="' . $url . '"' . $cur_attr . ' aria-haspopup="true">'
					. $label
					. '<span class="nav-arrow" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" focusable="false"><polyline points="5 8 10 13 15 8"/></svg></span>'
					. '</a>';
				echo '<div class="nav-dd">';
				foreach ( $item['children'] as $child ) {
					echo '<a href="' . esc_url( $child['url'] ) . '">' . esc_html( $child['label'] ) . '</a>';
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

/* â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•
   LOAD CUSTOMIZER + SAMPLE DATA
â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â•â• */
require_once EB_DIR . '/inc/customizer.php';
require_once EB_DIR . '/inc/sample-data.php';

/**
 * Parse nav/footer link textarea.
 * Format: "Label | /url" â€” one per line.
 * Sub-items (for dropdown) prefixed with 2 spaces: "  Sub Label | /url"
 * Returns [ ['label'=>'', 'url'=>'', 'desc'=>'', 'children'=>[...]], ... ]
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
		$parts = array_map( 'trim', explode( '|', $line, 3 ) );
		$label = $parts[0] ?? '';
		$url   = $parts[1] ?? '#';
		$desc  = $parts[2] ?? '';
		if ( $label === '' ) continue;
		if ( $is_child && $parent !== null ) {
			$items[ $parent ]['children'][] = [ 'label' => $label, 'url' => $url, 'desc' => $desc ];
		} else {
			$items[] = [ 'label' => $label, 'url' => $url, 'desc' => $desc, 'children' => [] ];
			$parent  = array_key_last( $items );
		}
	}
	return $items;
}

function eb_primary_category_name( $post_id = null ): string {
	$cats = get_the_category( $post_id ?: get_the_ID() );
	if ( empty( $cats ) ) {
		return __( 'General', 'enhancingbrain' );
	}
	return (string) $cats[0]->name;
}

/**
 * Render primary nav menu from Customizer OR fall back to wp_nav_menu.
 */
function eb_render_primary_nav( string $ul_class = 'nav-links' ): void {
	$raw = get_theme_mod( 'eb_nav_items', "Home | /\nArticles | /articles\n  Brain Health & Longevity | /category/brain-health-longevity | Sleep, exercise, nutrition, and brain aging\n  Focus & Productivity | /category/focus-productivity | Dopamine, deep work, and sustained attention\n  Memory & Learning | /category/memory-learning | Neuroplasticity, recall, and learning systems\n  Nootropics & Supplements | /category/nootropics-supplements | Evidence-based compounds for cognitive support\nAbout | /about\nContact | /contact" );
	if ( trim( $raw ) === '' ) {
		// Fallback to WP menu
		wp_nav_menu( [ 'theme_location' => 'primary', 'container' => false, 'items_wrap' => '<ul class="' . esc_attr( $ul_class ) . '" role="list">%3$s</ul>' ] );
		return;
	}
	$items   = eb_parse_menu_items( $raw );
	$has_contact = false;
	foreach ( $items as $item ) {
		if ( isset( $item['label'] ) && strtolower( trim( (string) $item['label'] ) ) === 'contact' ) {
			$has_contact = true;
			break;
		}
	}
	if ( ! $has_contact ) {
		$items[] = [ 'label' => 'Contact', 'url' => '/contact', 'desc' => '', 'children' => [] ];
	}
	$current = wp_parse_url( home_url( wp_unslash( $_SERVER['REQUEST_URI'] ?? '/' ) ), PHP_URL_PATH );
	$current = is_string( $current ) ? $current : '/';
	echo '<ul class="' . esc_attr( $ul_class ) . '" role="list">';
	foreach ( $items as $item ) {
		$has_sub = ! empty( $item['children'] );
		$is_cur  = ( $item['url'] !== '/' && $item['url'] !== '#' && strpos( $current, $item['url'] ) === 0 )
		           || ( $item['url'] === '/' && ( $current === '/' || $current === '' ) );
		$classes = $has_sub ? 'menu-item-has-children' : '';
		$item_url = $has_sub ? '#' : $item['url'];
		echo '<li' . ( $classes ? ' class="' . esc_attr( $classes ) . '"' : '' ) . '>';
		echo '<a href="' . esc_url( $item_url ) . '"'
			. ( $is_cur ? ' aria-current="page"' : '' )
			. ( $has_sub ? ' aria-haspopup="true"' : '' ) . '>'
			. esc_html( $item['label'] );
		if ( $has_sub ) {
			echo '<span class="nav-arrow" aria-hidden="true"><svg viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" focusable="false"><polyline points="5 8 10 13 15 8"/></svg></span>';
		}
		echo '</a>';
		if ( $has_sub ) {
			echo '<div class="nav-dd">';
			foreach ( $item['children'] as $child ) {
				$child_cur = strpos( $current, $child['url'] ) === 0;
				echo '<a href="' . esc_url( $child['url'] ) . '"' . ( $child_cur ? ' aria-current="page"' : '' ) . '>'
					. esc_html( $child['label'] )
					. ( ! empty( $child['desc'] ) ? '<small>' . esc_html( $child['desc'] ) . '</small>' : '' )
					. '</a>';
			}
			echo '</div>';
		}
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Handle contact form submission.
 */
function eb_handle_contact_submit(): void {
	if ( ! isset( $_POST['eb_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['eb_contact_nonce'] ) ), 'eb_contact_submit' ) ) {
		wp_die( esc_html__( 'Security check failed.', 'enhancingbrain' ) );
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
	$message_len = function_exists( 'wp_strlen' ) ? wp_strlen( $message ) : strlen( $message );

	$target = wp_get_referer();
	if ( ! is_string( $target ) || $target === '' ) {
		$target = home_url( '/contact/' );
	}
	if ( $email === '' || ! is_email( $email ) || $message === '' ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $target ) );
		exit;
	}
	if ( $message_len < 30 ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'short', $target ) );
		exit;
	}

	$recipient = sanitize_email( (string) get_option( 'admin_email' ) );
	if ( ! is_email( $recipient ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'error', $target ) );
		exit;
	}

	$site_name = (string) get_bloginfo( 'name' );
	$site_host = (string) wp_parse_url( home_url(), PHP_URL_HOST );
	$site_host = preg_replace( '/^www\./', '', strtolower( $site_host ) );
	$from_addr = is_string( $site_host ) && $site_host !== '' ? 'no-reply@' . $site_host : 'wordpress@localhost';
	$subject   = sprintf( '[%s] Contact form message', $site_name );
	$body      = "Name: {$name}\n";
	$body     .= "Email: {$email}\n\n";
	$body     .= "Message:\n{$message}\n";
	$reply_to_name = $name !== '' ? $name : 'Website Visitor';
	$headers       = [
		'From: ' . $site_name . ' <' . sanitize_email( $from_addr ) . '>',
		'Reply-To: ' . $reply_to_name . ' <' . $email . '>',
		'Content-Type: text/plain; charset=UTF-8',
	];

	$mail_error_message = '';
	$mail_failed_hook   = static function( $error ) use ( &$mail_error_message ): void {
		if ( $error instanceof WP_Error ) {
			$mail_error_message = $error->get_error_message();
		}
	};
	add_action( 'wp_mail_failed', $mail_failed_hook, 10, 1 );
	$sent = wp_mail( $recipient, $subject, $body, $headers );
	remove_action( 'wp_mail_failed', $mail_failed_hook, 10 );

	if ( ! $sent ) {
		$log_context = 'EnhancingBrain contact form mail failed for recipient: ' . $recipient;
		if ( $mail_error_message !== '' ) {
			set_transient( 'eb_contact_last_mail_error', sanitize_text_field( $mail_error_message ), 10 * MINUTE_IN_SECONDS );
			$log_context .= ' | reason: ' . $mail_error_message;
		}
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			error_log( $log_context );
		}
		wp_safe_redirect( add_query_arg( 'contact_status', 'mailfail', $target ) );
		exit;
	}

	delete_transient( 'eb_contact_last_mail_error' );
	wp_safe_redirect( add_query_arg( 'contact_status', 'sent', $target ) );
	exit;
}
add_action( 'admin_post_eb_contact_submit', 'eb_handle_contact_submit' );
add_action( 'admin_post_nopriv_eb_contact_submit', 'eb_handle_contact_submit' );
