<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manazel_Real_Estate_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="footer-widgets">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="widget-area footer-widget-area footer-1">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="widget-area footer-widget-area footer-2">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<div class="widget-area footer-widget-area footer-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<div class="widget-area footer-widget-area footer-4">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>
				<?php endif; ?>
			</div><!-- .footer-widgets -->

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'manazel-theme' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'manazel-theme' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'manazel-theme' ), 'Manazel Real Estate Theme', '<a href="https://example.com">Manus AI Agent</a>' );
					?>
			</div><!-- .site-info -->
			<div class="footer-contact-info">
				<p><?php esc_html_e('Contact us: contact@manazel.me | +123 456 7890', 'manazel-theme'); ?></p>
			</div>
			<div class="footer-social-media">
				<?php // Add social media icons/links here ?>
				<a href="#facebook">Facebook</a> | <a href="#twitter">Twitter</a> | <a href="#instagram">Instagram</a>
			</div>
			<div class="footer-newsletter">
				<h4><?php esc_html_e('Subscribe to our Newsletter', 'manazel-theme'); ?></h4>
				<?php // Add newsletter signup form here (e.g., using a plugin shortcode or custom form) ?>
				<form action="#" method="post">
					<input type="email" name="email" placeholder="<?php esc_attr_e('Your Email Address', 'manazel-theme'); ?>">
					<input type="submit" value="<?php esc_attr_e('Subscribe', 'manazel-theme'); ?>">
				</form>
			</div>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

