<?php
/**
 * Manazel Real Estate Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Manazel_Real_Estate_Theme
 */

if ( ! defined( 'MANAZEL_THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MANAZEL_THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'manazel_theme_setup' ) ) :سى
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function manazel_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Manazel Real Estate Theme, use a find and replace
		 * to change 'manazel-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'manazel-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'manazel-theme' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'manazel-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'manazel_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        // Add editor styles
        add_editor_style( 'style-editor.css' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'manazel_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function manazel_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'manazel_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'manazel_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function manazel_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'manazel-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'manazel-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'manazel-theme' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'manazel-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
    // You can register more footer widget areas (footer-2, footer-3, footer-4) as needed
}
add_action( 'widgets_init', 'manazel_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function manazel_theme_scripts() {
	wp_enqueue_style( 'manazel-theme-style', get_stylesheet_uri(), array(), MANAZEL_THEME_VERSION );
	wp_style_add_data( 'manazel-theme-style', 'rtl', 'replace' );

    // Enqueue Google Fonts (Cairo and Open Sans as examples for English)
    wp_enqueue_style( 'manazel-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@400;700&display=swap', array(), null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    // Main JS file (optional, if you have custom JS)
    // wp_enqueue_script( 'manazel-theme-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), MANAZEL_THEME_VERSION, true );

    // Navigation JS for mobile menu (example)
	// wp_enqueue_script( 'manazel-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), MANAZEL_THEME_VERSION, true );
	// wp_localize_script( 'manazel-theme-navigation', 'manazel_theme_menu_params', array(
    //     'menu_toggle_text' => esc_html__( 'Menu', 'manazel-theme' ),
    // ) );
}
add_action( 'wp_enqueue_scripts', 'manazel_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/inc/woocommerce.php';
// }

/**
 * Basic function to include template parts for sections like Hero, Features, etc.
 * This is a placeholder and would be expanded or replaced by more specific template tags or Elementor integration.
 */
function manazel_get_section_template_part( $slug, $name = null ) {
    get_template_part( 'template-parts/sections/section', $slug, array( 'name' => $name ) );
}

?>

