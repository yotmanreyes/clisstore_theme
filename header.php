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
			<div class="menu-trigger">
				<svg class="hamburger-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3 5H21" stroke="#111111" stroke-linecap="square"></path>
					<path d="M3 12H21" stroke="#111111" stroke-linecap="square"></path>
					<path d="M3 19H21" stroke="#111111" stroke-linecap="square"></path>
				</svg>
				<svg class="close-menu" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M18 6L6 18" stroke="currentColor" stroke-linecap="square"></path>
					<path d="M6 6L18 18" stroke="currentColor" stroke-linecap="square"></path>
				</svg>
			</div>
			<?php
			the_custom_logo();
			$clisstore_theme_description = get_bloginfo( 'description', 'display' );
			if ( $clisstore_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $clisstore_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
			<div class="nav-options">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M14.8398 15.1072L20.143 21" stroke="#111111"></path>
					<path d="M10.7146 16.7143C14.5017 16.7143 17.5717 13.6442 17.5717 9.85714C17.5717 6.07005 14.5017 3 10.7146 3C6.92747 3 3.85742 6.07005 3.85742 9.85714C3.85742 13.6442 6.92747 16.7143 10.7146 16.7143Z" stroke="#111111" data-ignore-fill=""></path>
				</svg>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.00029 21C3.98298 18.9558 4.74365 16.9788 6.13358 15.4554C6.77735 14.7397 7.5675 14.1648 8.45267 13.7683C9.33783 13.3718 10.2982 13.1624 11.2713 13.1538H12.729C13.689 13.1538 14.6401 13.3587 15.5112 13.7554C16.4108 14.1706 17.2129 14.7643 17.8667 15.499C18.5551 16.2405 19.0922 17.1047 19.4489 18.0446C19.8094 18.99 19.996 19.9907 20 21M12.0002 10.4621C12.5046 10.4697 13.0055 10.3788 13.4738 10.1947C13.9421 10.0106 14.3683 9.73698 14.7278 9.38978C15.0872 9.04259 15.3727 8.62875 15.5675 8.17235C15.7623 7.71594 15.8627 7.22608 15.8627 6.73128C15.8627 6.23648 15.7623 5.74663 15.5675 5.29022C15.3727 4.83381 15.0872 4.41997 14.7278 4.07278C14.3683 3.72559 13.9421 3.45198 13.4738 3.26788C13.0055 3.08379 12.5046 2.99287 12.0002 3.00044C10.9912 3.00044 10.0235 3.39355 9.31006 4.0933C8.5966 4.79305 8.19579 5.74212 8.19579 6.73172C8.19579 7.72132 8.5966 8.67038 9.31006 9.37013C10.0235 10.0699 10.9912 10.4621 12.0002 10.4621Z" stroke="#111111" stroke-linecap="square" data-ignore-fill=""></path>
				</svg>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M20.5 20.5H3.5V9H20.5V20.5Z" stroke="#111111" data-ignore-fill=""></path>
					<path d="M16.5 7.5C16.5 5.01472 14.4853 3 12 3C9.51472 3 7.5 5.01472 7.5 7.5" stroke="#111111" data-ignore-fill=""></path>
				</svg>
			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<nav>
		<?php
			wp_nav_menu( array(
				'theme_location'  => 'menu-1',
				'menu_id'        => 'nav-menu',
				'menu_class'     => 'nav-menu'
			) );
		?>
	</nav>
