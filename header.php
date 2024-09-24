<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clisstore_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'clisstore_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="first-row">
			<p>Made with Love ❤</p>
		</div>	
		<div class="second-row">
			<?php
			the_custom_logo();
			$clisstore_theme_description = get_bloginfo( 'description', 'display' );
			if ( $clisstore_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $clisstore_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav>
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'menu_id'        => 'nav-menu',
					'menu_class'     => 'nav-menu'
				) );
			?>
		</nav>
	</header><!-- #masthead -->
