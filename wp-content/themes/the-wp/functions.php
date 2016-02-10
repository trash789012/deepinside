<?php
/**
 * The WP functions and definitions
 *
 * @package The WP Theme
 */

if ( ! function_exists( 'the_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_wp_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 670; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Wp, use a find and replace
	 * to change 'the-wp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-wp', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => __( 'Primary Menu', 'the-wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_wp_custom_background_args', array(
		'default-image' => get_template_directory_uri().'/images/bg.jpg',
		'default-repeat' => 'repeat'
	) ) );
	
	add_theme_support( 'custom-header', apply_filters( 'the_wp_custom_header_args', array(
	    'default-image'          => '%s/images/default-image.jpg',
		'width'                  => 1000,
		'height'                 => 110,
		'default-text-color'     => '#FFF',
		/*'flex-height'            => true,*/
	) ) );
	
	add_theme_support( 'post-thumbnails' );
	
	//add_editor_style();
}
endif; // the_wp_setup
add_action( 'after_setup_theme', 'the_wp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function the_wp_widgets_init() {
	// Sidebars
	register_sidebar( array(
		'name'          => sprintf( "%1s &rarr; %2s" , __( 'Sidebar', 'the-wp' ), __( 'Right', 'the-wp' ) ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s &rarr; %2s" , __( 'Sidebar', 'the-wp' ), __( 'Left', 'the-wp' ) ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	// Home Page
	register_sidebar( array(
		'name'          => __( 'Front page', 'the-wp' ),
		'id'            => 'front-page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	// Footer
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 1, __( 'Full Size', 'the-wp' ) ),
		'id'            => 'footer-full',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 1, __( 'Left', 'the-wp' ) ),
		'id'            => 'footer-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 2, __( 'Center', 'the-wp' ) ),
		'id'            => 'footer-center',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => sprintf( "%1s %1d &rarr; %2s" , __( 'Footer', 'the-wp' ), 3, __( 'Right', 'the-wp' ) ),
		'id'            => 'footer-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	
}
add_action( 'widgets_init', 'the_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_wp_scripts() {
	wp_enqueue_style( 'the-wp-theme-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',array() );
	
	wp_enqueue_style( 'the-wp-theme-google-fonts','//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700',array() );

	wp_enqueue_script( 'the-wp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'the-wp-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'the-wp-theme-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '' );
	wp_enqueue_script( 'the-wp-theme-fitvids-doc-ready', get_template_directory_uri() . '/js/fitvids-doc-ready.js', array('jquery'), '' );
	
	wp_enqueue_script( 'the-wp-theme-basejs',get_template_directory_uri().'/js/base.js',array('jquery'),'' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Register JQuery cycle js file for slider.
	 */
	wp_register_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), '2.9999.5', true );

	/**
	 * Enqueue Slider setup js file.
	 */	
	if( get_theme_mod( 'enable_slider' ) ) {
		if ( is_home() || is_front_page() ) {
			wp_enqueue_script( 'the-wp-slider', get_template_directory_uri() . '/js/slider-setting.js', array( 'jquery-cycle' ), false, true );

		}
	}
	
	/**
    * Browser specific queuing i.e
    */
	$the_wp_user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(preg_match('/(?i)msie [1-8]/',$the_wp_user_agent)) {
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/js/html5shiv.min.js', true );
	}
}
add_action( 'wp_enqueue_scripts', 'the_wp_scripts' );

/**
 * Custom CSS
 */
require get_template_directory() . '/inc/custom-css.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load Slider
 */
require_once( get_template_directory() . '/inc/header-functions.php' );







/*************************/
			/* Sets the path to the parent theme directory. */
			define( 'CEEWP_THEMEDIR', get_template_directory() );

			/* Sets the path to the parent theme directory URI. */
			define( 'CEEWP_THEMEURI', get_template_directory_uri() );
			
			/* Include Helper functions */
			require_once( CEEWP_THEMEDIR . '/inc/admin/helpers.php' );

			/* */
			$the_wp = wp_get_theme();
			define( 'CEEWP_THEMEVER', esc_attr( $the_wp->get( 'Version' ) ) );
			
			require_once( CEEWP_THEMEDIR . '/inc/widgets.php' );
?>