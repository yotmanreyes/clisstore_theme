<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clisstore_theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="col-1">
				<h3>Help</h3>
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'menu-2',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer-menu'
					) );
				?>
			</div>
			<div class="col-2">
				<h3>Info</h3>
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'menu-3',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer-menu'
					) );
				?>
			</div>
			<div class="col-3 newsletter-container">
				<h3>Subscribe to newsletter!</h3>
				<form class="newsletter-form" action="">
					<input type="text" name="" id="" placeholder="Email Address">
				</form>
			</div>
		</div><!-- .site-info -->
		<div class="copyright">
			<p>© <?php echo date('Y') ?> - All rights reserved</p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
