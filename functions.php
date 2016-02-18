<?php
/**
 * rt-restaurants functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rt-restaurants
 */

if ( ! function_exists( 'rt_restaurants_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rt_restaurants_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rt-restaurants, use a find and replace
	 * to change 'rt-restaurants' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rt-restaurants', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rt-restaurants' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rt_restaurants_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'rt_restaurants_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rt_restaurants_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rt_restaurants_content_width', 640 );
}
add_action( 'after_setup_theme', 'rt_restaurants_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rt_restaurants_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rt-restaurants' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rt_restaurants_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rt_restaurants_scripts() {
	wp_enqueue_style( 'rt-restaurants-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rt-restaurants-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'rt-restaurants-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rt_restaurants_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

//custom code starts here

add_action('wp_enqueue_scripts','enqueue_styles');
/**
 * grid layout added
 */
function enqueue_styles(){
	wp_enqueue_style( "grid_css", get_template_directory_uri() . '/layouts/grid-layout.css' );
	wp_enqueue_style( "restaurant_page_css", get_template_directory_uri() . '/layouts/content-restaurants.css' );
	wp_enqueue_style( "header_css", get_template_directory_uri() . '/layouts/custom-header.css' );
	wp_enqueue_style( "font_css", 'https://fonts.googleapis.com/css?family=Great+Vibes' );
	
	wp_enqueue_style( "footer_css", get_template_directory_uri() . '/layouts/custom-footer.css' );
	
	wp_register_style('rt-restaurants-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
	wp_enqueue_style( 'rt-restaurants-font-awesome');
	wp_register_style('rt-restaurants-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto');
	wp_enqueue_style( 'rt-restaurants-font-roboto');
}

/**
 * custom menu add
 */
function clean_custom_menus() {

	$locations = get_nav_menu_locations();
	//menu name
	$menu_name = 'primary';

	//check if menu is present
	if ( isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );
		?>
			<?php
				foreach ( ( array ) $menu_items as $key => $menu_item ) {
					$title = $menu_item->title;
					$url = $menu_item->url;
			?>
			<span>
				<a class="nav-links" href="<?php echo $url ?>"><?php echo strtoupper( $title ) ?></a>
			</span>
			<?php
		}
		?>
		<?php
	}
}
