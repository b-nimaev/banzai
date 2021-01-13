<?php
/**
 * banzai functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package banzai
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'domino_digital_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function domino_digital_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on banzai, use a find and replace
		 * to change 'domino_digital' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'domino_digital', get_template_directory() . '/languages' );

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
				'menu' => esc_html__( 'header', 'domino_digital' ),
				'footer' => esc_html__( 'footer', 'domino_digital' ),
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
				'domino_digital_custom_background_args',
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
	}
endif;
add_action( 'after_setup_theme', 'domino_digital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function domino_digital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'domino_digital_content_width', 640 );
}
add_action( 'after_setup_theme', 'domino_digital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function domino_digital_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'domino_store' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'domino_store' ),
			'before_widget' => '<div id="%1$s" class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-heading">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'domino_digital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function domino_digital_scripts() {
	wp_enqueue_style( 'domino_digital-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', false, false, true );
	wp_enqueue_script( 'jquery');

	wp_register_script( 'domino-slider', get_template_directory_uri() . '/js/slick.min.js',  array('jquery'), $ver = false, $in_footer = true );
	wp_enqueue_script( 'domino-slider');

	wp_register_script( 'domino-masonry', get_template_directory_uri() . '/js/masonry.js',  array('jquery'), $ver = false, $in_footer = true );
	wp_enqueue_script( 'domino-masonry');

	wp_register_script( 'domino-script', get_template_directory_uri() . '/js/common.js',  array('jquery', 'domino-masonry'), $ver = false, $in_footer = true );
	wp_enqueue_script( 'domino-script');

	wp_localize_script( 'domino-script', 'ajax_url', array(
		'url' => admin_url('admin-ajax.php')
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'domino_digital_scripts' );

add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );
function my_header_add_to_cart_fragment( $fragments ) {
    $count = WC()->cart->get_cart_contents_count();

    $fragments['.cart_counter'] = '<span class="cart_counter" class="cart__amount">' . esc_attr( $count ) . '</span>';

    ob_start();

		?>
		<div class="mini-cart-wrapper">
			<?php woocommerce_mini_cart(); ?>
		</div>

<?php
    $fragments['.mini-cart-wrapper'] = ob_get_clean();

    return $fragments;
}

function add_to_cart_quantity_callback() {
	$post_id = intval($_POST['post_id']);
	$quantity = intval($_POST['count']);

	global $woocommerce;

	$woocommerce->cart->add_to_cart(
		$product_id = $post_id,
		$quantity,
		$variation_id = 0,
		$variation = array(),
		$cart_item_data = array()
	);
	wp_die();
}

add_action('wp_ajax_add_to_cart_quantity', 'add_to_cart_quantity_callback');
add_action('wp_ajax_nopriv_add_to_cart_quantity', 'add_to_cart_quantity_callback');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
