<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manazel_Real_Estate_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'manazel-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
            <div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) : // For SEO, H1 on homepage, P on other pages
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else : // P on other pages
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$manazel_theme_description = get_bloginfo( 'description', 'display' );
				if ( $manazel_theme_description || is_customize_preview() ) : // Display tagline if it exists
					?>
					<p class="site-description"><?php echo $manazel_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'manazel-theme' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1', // Corresponds to the menu registered in functions.php
						'menu_id'        => 'primary-menu',
                        'menu_class'     => 'primary-menu-ul',
					)
				);
				?>
			</nav><!-- #site-navigation -->
            <a href="#contact" class="header-cta-button"><?php esc_html_e( 'Contact Us', 'manazel-theme' ); ?></a>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

