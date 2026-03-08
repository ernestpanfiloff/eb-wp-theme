<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="profile" href="https://gmpg.org/xfn/11"/>
<script>document.documentElement.classList.add('js');</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a href="#main-content" class="skip-link"><?php esc_html_e( 'Skip to content', 'enhancingbrain' ); ?></a>

<header id="site-header">
	<div class="nav">

		<?php echo eb_logo_html(); ?>

		<nav aria-label="<?php esc_attr_e( 'Primary navigation', 'enhancingbrain' ); ?>">
			<?php eb_render_primary_nav(); ?>
		</nav>

		<?php if ( get_theme_mod( 'eb_nav_show_cta', '1' ) ) : ?>
		<a href="<?php echo esc_url( get_theme_mod( 'eb_nav_cta_url', '#newsletter' ) ); ?>" class="nav-cta">
			<?php if ( get_theme_mod( 'eb_nav_cta_show_icon', '1' ) ) : ?>
			<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
			<?php endif; ?>
			<?php echo esc_html( get_theme_mod( 'eb_nav_cta_text', 'Get the Free Newsletter →' ) ); ?>
		</a>
		<?php endif; ?>

		<button class="burger" id="burger"
			aria-label="<?php esc_attr_e( 'Open navigation menu', 'enhancingbrain' ); ?>"
			aria-expanded="false" aria-controls="mobMenu">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</button>
	</div>
</header>

<div class="mob-menu" id="mobMenu" aria-hidden="true">
	<div class="mob-menu-head">
		<?php echo eb_logo_html( 'mob-menu-logo' ); ?>
		<button class="mob-close" id="mobClose" aria-label="<?php esc_attr_e( 'Close navigation menu', 'enhancingbrain' ); ?>">&#x2715;</button>
	</div>
	<div class="mob-body">
		<?php eb_render_primary_nav( 'mob-nav-list' ); ?>
		<?php if ( get_theme_mod( 'eb_nav_show_cta', '1' ) ) : ?>
		<div class="mob-cta">
			<a href="<?php echo esc_url( get_theme_mod( 'eb_nav_cta_url', '#newsletter' ) ); ?>">
				<?php if ( get_theme_mod( 'eb_nav_cta_show_icon', '1' ) ) : ?>
				<svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"/><polyline points="2,4 12,14 22,4"/></svg>
				<?php endif; ?>
				<?php echo esc_html( get_theme_mod( 'eb_nav_cta_text', 'Get the Free Newsletter →' ) ); ?>
			</a>
		</div>
		<?php endif; ?>
	</div>
</div>

