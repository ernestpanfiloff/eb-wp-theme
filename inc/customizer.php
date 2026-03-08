<?php
/**
 * Enhancing Brain - Customizer
 */
defined( 'ABSPATH' ) || exit;

function eb_customizer_register( WP_Customize_Manager $wp_customize ) {

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_control( 'blogdescription' );

	/* MAIN PANEL */
	$wp_customize->add_panel( 'eb_panel', [
		'title'    => __( 'Enhancing Brain', 'enhancingbrain' ),
		'priority' => 30,
	] );

	/* 1 - BRANDING */
	$wp_customize->add_section( 'eb_branding', [ 'title' => __( 'Branding and Identity', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 10 ] );

	$wp_customize->add_setting( 'blogname', [ 'default' => 'Enhancing Brain', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ] );
	$wp_customize->add_control( 'blogname', [ 'label' => __( 'Site Name', 'enhancingbrain' ), 'section' => 'eb_branding', 'type' => 'text' ] );

	$wp_customize->add_setting( 'blogdescription', [ 'default' => 'Neuroscience for high performers.', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ] );
	$wp_customize->add_control( 'blogdescription', [ 'label' => __( 'Site Tagline', 'enhancingbrain' ), 'section' => 'eb_branding', 'type' => 'text' ] );

	eb_ctl( $wp_customize, 'eb_disclaimer_text', [
		'default' => 'Not medical advice. For educational purposes only. Always consult a qualified healthcare professional before making changes to your health.',
		'label'   => __( 'Disclaimer Text (used everywhere)', 'enhancingbrain' ),
		'section' => 'eb_branding', 'type' => 'textarea',
	] );

	/* 2 - COLOURS */
	$wp_customize->add_section( 'eb_colours', [ 'title' => __( 'Colours', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 15 ] );
	foreach ( [
		'eb_color_accent'    => [ '#0bbf96', 'Accent Green'      ],
		'eb_color_accent_dk' => [ '#089e7d', 'Accent Green Dark' ],
		'eb_color_ink'       => [ '#0e1420', 'Ink (Dark Text)'   ],
		'eb_color_muted'     => [ '#4e5a6a', 'Muted Text'        ],
		'eb_color_bg'        => [ '#fafaf8', 'Page Background'   ],
	] as $id => [ $default, $label ] ) {
		$wp_customize->add_setting( $id, [ 'default' => $default, 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ] );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, [ 'label' => __( $label, 'enhancingbrain' ), 'section' => 'eb_colours' ] ) );
	}

	/* 3 - NAVIGATION */
	$default_nav = "Home | /\nArticles | /articles\n  Brain Health & Longevity | /category/brain-health-longevity | Sleep, exercise, nutrition, and brain aging\n  Focus & Productivity | /category/focus-productivity | Dopamine, deep work, and sustained attention\n  Memory & Learning | /category/memory-learning | Neuroplasticity, recall, and learning systems\n  Nootropics & Supplements | /category/nootropics-supplements | Evidence-based compounds for cognitive support\nAbout | /about";
	$wp_customize->add_section( 'eb_nav', [
		'title'       => __( 'Navigation and Header', 'enhancingbrain' ),
		'panel'       => 'eb_panel', 'priority' => 18,
		'description' => __( "Build your menu below. One item per line: Label | /url\nIndent sub-items with 2 spaces for a dropdown:\n  Sub Item | /url\n\nAdd as many items as you like.", 'enhancingbrain' ),
	] );
	eb_ctl( $wp_customize, 'eb_nav_items', [
		'default'     => $default_nav,
		'label'       => __( 'Menu Items (Label | /url, indent for dropdowns)', 'enhancingbrain' ),
		'section'     => 'eb_nav', 'type' => 'textarea', 'transport' => 'refresh',
	] );
	eb_ctl( $wp_customize, 'eb_nav_show_cta',      [ 'default' => '1',          'label' => __( 'Show CTA Button',              'enhancingbrain' ), 'section' => 'eb_nav', 'type' => 'checkbox' ] );
	eb_ctl( $wp_customize, 'eb_nav_cta_text',      [ 'default' => 'Get the Free Newsletter →', 'label' => __( 'CTA Button - Text',            'enhancingbrain' ), 'section' => 'eb_nav', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_nav_cta_url',       [ 'default' => '#newsletter','label' => __( 'CTA Button - Link URL',        'enhancingbrain' ), 'section' => 'eb_nav', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_nav_cta_show_icon', [ 'default' => '1',          'label' => __( 'Show email icon on CTA button','enhancingbrain' ), 'section' => 'eb_nav', 'type' => 'checkbox' ] );

	/* 4 - HERO */
	$wp_customize->add_section( 'eb_hero', [
		'title'       => __( 'Hero Section', 'enhancingbrain' ),
		'panel'       => 'eb_panel', 'priority' => 20,
		'description' => __( 'Use [eb_highlight]text[/eb_highlight] for the green italic accent.', 'enhancingbrain' ),
	] );
	eb_ctl( $wp_customize, 'eb_hero_visible',     [ 'default' => '1',  'label' => __( 'Show Hero Section', 'enhancingbrain' ), 'section' => 'eb_hero', 'type' => 'checkbox', 'transport' => 'refresh' ] );
	eb_ctl( $wp_customize, 'eb_hero_eyebrow',     [ 'default' => 'Welcome to Enhancing Brain', 'label' => __( 'Eyebrow Label', 'enhancingbrain' ), 'section' => 'eb_hero', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_hero_headline',    [ 'default' => 'Train your brain like your success depends on it. [eb_highlight]Because it does.[/eb_highlight]', 'label' => __( 'Headline', 'enhancingbrain' ), 'section' => 'eb_hero', 'type' => 'textarea' ] );
	eb_ctl( $wp_customize, 'eb_hero_subheadline', [ 'default' => 'Learn how to improve focus, sharpen thinking, protect your brain from burnout, and perform at your best using neuroscience.', 'label' => __( 'Subheadline', 'enhancingbrain' ), 'section' => 'eb_hero', 'type' => 'textarea' ] );
	eb_ctl( $wp_customize, 'eb_hero_pills',       [ 'default' => 'Science-backed, Primary sources, No BS, Free weekly newsletter, Not medical advice', 'label' => __( 'Pills (comma-separated)', 'enhancingbrain' ), 'section' => 'eb_hero', 'type' => 'text' ] );

	/* 5 - NEWSLETTER CARD */
	$wp_customize->add_section( 'eb_newsletter_card', [ 'title' => __( 'Newsletter Card', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 25 ] );
	foreach ( [
		'eb_nl_label'       => [ '#1 Newsletter on brain performance.', 'Card Label', 'text' ],
		'eb_nl_title'       => [ 'Neuroscience for High Performers.', 'Card Title', 'text' ],
		'eb_nl_desc'        => [ 'Actionable tips on memory, focus, brain health, nootropics and more... Weekly 5-min reads.', 'Description', 'textarea' ],
		'eb_nl_btn'         => [ 'Subscribe for free →', 'Button Text', 'text' ],
		'eb_nl_form_action' => [ '', 'Form Action URL (MailChimp/MailPoet endpoint)', 'url' ],
		'eb_nl_proof'       => [ 'Joined by 600+ readers', 'Social Proof Text', 'text' ],
		'eb_nl_disclaimer'  => [ 'No spam. No AI slop. Unsubscribe anytime.', 'Card Disclaimer', 'text' ],
	] as $id => [ $default, $label, $type ] ) {
		eb_ctl( $wp_customize, $id, [ 'default' => $default, 'label' => __( $label, 'enhancingbrain' ), 'section' => 'eb_newsletter_card', 'type' => $type ] );
	}

	/* 6 - STATS BAR */
	$wp_customize->add_section( 'eb_stats', [ 'title' => __( 'Stats Bar', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 30 ] );
	eb_ctl( $wp_customize, 'eb_stats_visible', [ 'default' => '1', 'label' => __( 'Show Stats Bar', 'enhancingbrain' ), 'section' => 'eb_stats', 'type' => 'checkbox', 'transport' => 'refresh' ] );
	foreach ( [ 1 => [ '600+', 'Newsletter Subscribers' ], 2 => [ '100K+', 'Social Media Followers' ], 3 => [ '200M+', 'Views of social media' ], 4 => [ '5 min', 'Average Read Time' ] ] as $i => [ $n, $l ] ) {
		eb_ctl( $wp_customize, "eb_stat_{$i}_number", [ 'default' => $n, 'label' => sprintf( __( 'Stat %d - Value', 'enhancingbrain' ), $i ), 'section' => 'eb_stats', 'type' => 'text' ] );
		eb_ctl( $wp_customize, "eb_stat_{$i}_label",  [ 'default' => $l, 'label' => sprintf( __( 'Stat %d - Label', 'enhancingbrain' ), $i ), 'section' => 'eb_stats', 'type' => 'text' ] );
	}

	/* 7 - ARTICLES */
	$wp_customize->add_section( 'eb_articles', [ 'title' => __( 'Articles Section', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 35 ] );
	eb_ctl( $wp_customize, 'eb_articles_visible',   [ 'default' => '1',                   'label' => __( 'Show Articles Section',  'enhancingbrain' ), 'section' => 'eb_articles', 'type' => 'checkbox', 'transport' => 'refresh' ] );
	eb_ctl( $wp_customize, 'eb_articles_eyebrow',   [ 'default' => 'Blog',                'label' => __( 'Eyebrow Text',           'enhancingbrain' ), 'section' => 'eb_articles', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_articles_heading',   [ 'default' => 'Latest Articles',     'label' => __( 'Section Heading',        'enhancingbrain' ), 'section' => 'eb_articles', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_articles_link_text', [ 'default' => 'View all articles →', 'label' => __( 'View All Link Text',     'enhancingbrain' ), 'section' => 'eb_articles', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_articles_count',     [ 'default' => '6',                   'label' => __( 'Number of Posts',        'enhancingbrain' ), 'section' => 'eb_articles', 'type' => 'number' ] );

	/* 8 - LEAD MAGNET */
	$wp_customize->add_section( 'eb_lead_magnet', [ 'title' => __( 'Lead Magnet Block', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 40 ] );
	eb_ctl( $wp_customize, 'eb_lm_visible',   [ 'default' => '1', 'label' => __( 'Show Lead Magnet Block', 'enhancingbrain' ), 'section' => 'eb_lead_magnet', 'type' => 'checkbox', 'transport' => 'refresh' ] );
	foreach ( [
		'eb_lm_eyebrow'  => [ 'Free Download', 'Eyebrow Label', 'text' ],
		'eb_lm_headline' => [ 'The [eb_highlight]Brain Stack[/eb_highlight] - 11 nutrients your brain actually needs.', 'Headline', 'textarea' ],
		'eb_lm_desc'     => [ 'Science-backed breakdown of 11 core brain nutrients for focus, memory, mental clarity, and long-term health. Explained simply, no hype.', 'Description', 'textarea' ],
		'eb_lm_bullet_1' => [ 'What each nutrient does in the brain',       'Bullet 1', 'text' ],
		'eb_lm_bullet_2' => [ 'Why it matters for high performance',         'Bullet 2', 'text' ],
		'eb_lm_bullet_3' => [ 'Food sources and supplementation guidance',   'Bullet 3', 'text' ],
		'eb_lm_bullet_4' => [ 'Backed by peer-reviewed human trials',        'Bullet 4', 'text' ],
		'eb_lm_btn_text' => [ 'Comment "STACK" on Instagram →',              'Button Text', 'text' ],
		'eb_lm_btn_url'  => [ 'https://www.instagram.com/enhancingbrain',    'Button URL',  'url'  ],
	] as $id => [ $default, $label, $type ] ) {
		eb_ctl( $wp_customize, $id, [ 'default' => $default, 'label' => __( $label, 'enhancingbrain' ), 'section' => 'eb_lead_magnet', 'type' => $type ] );
	}

	/* 9 - TOPICS */
	$wp_customize->add_section( 'eb_topics', [ 'title' => __( 'Topics Section', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 45 ] );
	eb_ctl( $wp_customize, 'eb_topics_visible', [ 'default' => '1',                          'label' => __( 'Show Topics Section',  'enhancingbrain' ), 'section' => 'eb_topics', 'type' => 'checkbox', 'transport' => 'refresh' ] );
	eb_ctl( $wp_customize, 'eb_topics_eyebrow', [ 'default' => 'Browse Articles by Topic',   'label' => __( 'Eyebrow',              'enhancingbrain' ), 'section' => 'eb_topics', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_topics_heading', [ 'default' => 'Explore Topics',             'label' => __( 'Section Heading',      'enhancingbrain' ), 'section' => 'eb_topics', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_topics_link',    [ 'default' => 'All articles →',             'label' => __( 'View All Link Text',   'enhancingbrain' ), 'section' => 'eb_topics', 'type' => 'text' ] );

	/* 10 - FOOTER */
	$default_footer_nav = "Home | /\nArticles | /articles\nAbout | /about\nPrivacy Policy | /privacy-policy";
	$wp_customize->add_section( 'eb_footer', [
		'title'       => __( 'Footer', 'enhancingbrain' ),
		'panel'       => 'eb_panel', 'priority' => 60,
		'description' => __( 'Footer column links use the same format as the nav menu: Label | /url, one per line.', 'enhancingbrain' ),
	] );

	/* Section toggles */
	eb_ctl( $wp_customize, 'eb_footer_show_content_col',     [ 'default' => '1', 'label' => __( 'Show "Content" column',       'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'checkbox' ] );
	eb_ctl( $wp_customize, 'eb_footer_show_resources_col',   [ 'default' => '1', 'label' => __( 'Show "Resources" column',     'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'checkbox' ] );
	eb_ctl( $wp_customize, 'eb_footer_show_research_col',    [ 'default' => '1', 'label' => __( 'Show "Research From" column', 'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'checkbox' ] );
	eb_ctl( $wp_customize, 'eb_footer_show_disclaimer',      [ 'default' => '1', 'label' => __( 'Show disclaimer text',        'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'checkbox' ] );
	eb_ctl( $wp_customize, 'eb_footer_show_disclaimer_pill', [ 'default' => '1', 'label' => __( 'Show "Not a doctor" pill',    'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'checkbox' ] );

	/* Content */
	eb_ctl( $wp_customize, 'eb_footer_tagline',              [ 'default' => 'Neuroscience for high performers. Peer-reviewed research translated into what actually matters.', 'label' => __( 'Footer Tagline', 'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'textarea' ] );
	eb_ctl( $wp_customize, 'eb_footer_copyright',            [ 'default' => '(c) ' . gmdate( 'Y' ) . ' Enhancing Brain. All rights reserved.', 'label' => __( 'Copyright Text', 'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_footer_disclaimer_pill_text', [ 'default' => 'Not a doctor - Educational use only', 'label' => __( 'Disclaimer Pill Text', 'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'text' ] );

	/* Social */
	eb_ctl( $wp_customize, 'eb_footer_ig_url', [ 'default' => 'https://www.instagram.com/enhancingbrain', 'label' => __( 'Instagram URL', 'enhancingbrain' ),                 'section' => 'eb_footer', 'type' => 'url' ] );
	eb_ctl( $wp_customize, 'eb_footer_yt_url', [ 'default' => '', 'label' => __( 'YouTube URL (blank = hidden)',       'enhancingbrain' ),                                     'section' => 'eb_footer', 'type' => 'url' ] );
	eb_ctl( $wp_customize, 'eb_footer_x_url',  [ 'default' => '', 'label' => __( 'X / Twitter URL (blank = hidden)',  'enhancingbrain' ),                                     'section' => 'eb_footer', 'type' => 'url' ] );

	/* Footer column headings */
	eb_ctl( $wp_customize, 'eb_footer_col1_heading', [ 'default' => 'Categories',      'label' => __( '"Content" Column Heading',      'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_footer_col2_heading', [ 'default' => 'Resources',    'label' => __( '"Resources" Column Heading',    'enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'text' ] );
	eb_ctl( $wp_customize, 'eb_footer_col3_heading', [ 'default' => 'Research','label' => __( '"Research From" Column Heading','enhancingbrain' ), 'section' => 'eb_footer', 'type' => 'text' ] );

	/* Footer column links - unlimited textarea format */
	eb_ctl( $wp_customize, 'eb_footer_col1_links', [
		'default' => "All Articles | /articles\nBrain Health | /category/brain-health-longevity\nFocus & Productivity | /category/focus-productivity\nMemory & Learning | /category/memory-learning\nNootropics | /category/nootropics-supplements",
		'label'       => __( '"Content" Column Links (Label | /url, one per line)', 'enhancingbrain' ),
		'section'     => 'eb_footer', 'type' => 'textarea', 'transport' => 'refresh',
	] );
	eb_ctl( $wp_customize, 'eb_footer_col2_links', [
		'default' => "The Brain Stack (Free) | https://www.instagram.com/enhancingbrain\nNewsletter | /#newsletter\nAbout | /about\nStyle Guide | /style-guide",
		'label'       => __( '"Resources" Column Links (Label | /url, one per line)', 'enhancingbrain' ),
		'section'     => 'eb_footer', 'type' => 'textarea', 'transport' => 'refresh',
	] );
	eb_ctl( $wp_customize, 'eb_footer_col3_links', [
		'default' => "PubMed | https://pubmed.ncbi.nlm.nih.gov\nNIH | https://www.nih.gov\nNature Neuroscience | https://www.nature.com/neuro\nHuberman Lab | https://hubermanlab.com",
		'label'       => __( '"Research From" Column Links (Label | /url, one per line)', 'enhancingbrain' ),
		'section'     => 'eb_footer', 'type' => 'textarea', 'transport' => 'refresh',
	] );

	/* 11 - TYPOGRAPHY */
	$wp_customize->add_section( 'eb_typography', [ 'title' => __( 'Typography', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 70 ] );
	$wp_customize->add_setting( 'eb_base_font_size', [ 'default' => '15', 'sanitize_callback' => 'absint', 'transport' => 'postMessage' ] );
	$wp_customize->add_control( 'eb_base_font_size', [ 'label' => __( 'Base Font Size (px)', 'enhancingbrain' ), 'section' => 'eb_typography', 'type' => 'range', 'input_attrs' => [ 'min' => 13, 'max' => 18, 'step' => 1 ] ] );

	/* 12 - ADVANCED */
	$wp_customize->add_section( 'eb_advanced', [ 'title' => __( 'Advanced / Scripts', 'enhancingbrain' ), 'panel' => 'eb_panel', 'priority' => 90 ] );
	eb_ctl( $wp_customize, 'eb_head_scripts',   [ 'default' => '', 'label' => __( 'Custom <head> code', 'enhancingbrain' ),         'section' => 'eb_advanced', 'type' => 'textarea', 'transport' => 'refresh' ] );
	eb_ctl( $wp_customize, 'eb_footer_scripts', [ 'default' => '', 'label' => __( 'Custom footer code (before </body>)', 'enhancingbrain' ), 'section' => 'eb_advanced', 'type' => 'textarea', 'transport' => 'refresh' ] );
}
add_action( 'customize_register', 'eb_customizer_register' );

/* HELPER: add setting + control in one call */
function eb_ctl( WP_Customize_Manager $wpc, string $id, array $args ) {
	$type = $args['type'] ?? 'text';
	$wpc->add_setting( $id, [
		'default'           => $args['default'] ?? '',
		'sanitize_callback' => ( $type === 'url' ? 'esc_url_raw' : ( $type === 'checkbox' ? 'eb_sanitize_cb' : ( $type === 'number' ? 'absint' : 'sanitize_textarea_field' ) ) ),
		'transport'         => $args['transport'] ?? 'postMessage',
	] );
	$wpc->add_control( $id, [
		'label'       => $args['label'] ?? '',
		'section'     => $args['section'],
		'type'        => $type,
		'description' => $args['description'] ?? '',
	] );
}
function eb_sanitize_cb( $val ) { return $val ? '1' : ''; }

/* CSS vars -> <head> */
function eb_customizer_css() {
	$vars = [
		'--accent'    => sanitize_hex_color( get_theme_mod( 'eb_color_accent',    '#0bbf96' ) ),
		'--accent-dk' => sanitize_hex_color( get_theme_mod( 'eb_color_accent_dk', '#089e7d' ) ),
		'--ink'       => sanitize_hex_color( get_theme_mod( 'eb_color_ink',       '#0e1420' ) ),
		'--muted'     => sanitize_hex_color( get_theme_mod( 'eb_color_muted',     '#4e5a6a' ) ),
		'--bg'        => sanitize_hex_color( get_theme_mod( 'eb_color_bg',        '#fafaf8' ) ),
	];
	$fs  = absint( get_theme_mod( 'eb_base_font_size', 15 ) );
	$css = ':root{';
	foreach ( $vars as $k => $v ) { if ( $v ) $css .= $k . ':' . $v . ';'; }
	$css .= 'font-size:' . $fs . 'px;}';
	echo '<style id="eb-customizer-css">' . $css . '</style>' . "\n";
}
add_action( 'wp_head', 'eb_customizer_css', 99 );

function eb_custom_head_scripts() {
	$c = get_theme_mod( 'eb_head_scripts', '' );
	if ( $c ) echo "\n" . wp_unslash( $c ) . "\n";
}
add_action( 'wp_head', 'eb_custom_head_scripts', 100 );

function eb_custom_footer_scripts() {
	$c = get_theme_mod( 'eb_footer_scripts', '' );
	if ( $c ) echo "\n" . wp_unslash( $c ) . "\n";
}
add_action( 'wp_footer', 'eb_custom_footer_scripts', 100 );

