<?php
/**
 * Misfit Foodie functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Misfit_Foodie
 */

//Require psr-4 Autoload
if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// use Inc\Api\SettingsApi;
// SettingsApi::helloWorld();
//Initialize Admin Section Classes From Inc folder
if ( class_exists('Inc\\Init' ) ) {
	Inc\Init::register_services();
}


if ( ! function_exists( 'misfit_foodie_setup' ) ) :
	
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function misfit_foodie_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Misfit Foodie, use a find and replace
		 * to change 'misfit-foodie' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'misfit-foodie', get_template_directory() . '/languages' );

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
			'primary'    => esc_html__( 'Bottom Header Menu', 'misfit-foodie' ),
			'top_header' => esc_html__( 'Top Header Menu', 'misfit-foodie' ),
			'mobile'     => esc_html__( 'Mobile Menu', 'misfit-foodie' ),
			'footer'     => esc_html__( 'Footer Menu', 'misfit-foodie' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'misfit_foodie_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'misfit_foodie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function misfit_foodie_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'misfit_foodie_content_width', 640 );
}
add_action( 'after_setup_theme', 'misfit_foodie_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function misfit_foodie_scripts() {
	wp_register_script('misfit-foodie-main',  get_template_directory_uri() . '/assets/js/main.js', array('jquery'),'1.1', true);
	wp_localize_script('misfit-foodie-main', 'main_ajax', array('ajax' => admin_url( 'admin-ajax.php' ))); //Localizing AJAX 
	wp_enqueue_script('misfit-foodie-main');
	wp_enqueue_style('sass', get_template_directory_uri().'/build/css/style.css');
	wp_enqueue_style('bootstramp', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap-grid', get_template_directory_uri().'/assets/css/bootstrap-grid.min.css');
	wp_enqueue_style('bootstrap-reboot', get_template_directory_uri().'/assets/css/bootstrap-reboot.min.css');
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css?family=Poppins',true);
	wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900',true);
	wp_enqueue_style( 'abril', 'https://fonts.googleapis.com/css?family=Abril+Fatface',true);
	wp_enqueue_style( 'league', 'https://fonts.googleapis.com/css?family=League+Script',true);
	wp_enqueue_style( 'misfit-foodie-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_script( 'misfit-foodie-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'misfit-foodie-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'misfit_foodie_scripts' );

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

/***************************************************
 * CUSTOM FUNCTIONS FOR THEME
***************************************************/

/**
* Load stylesheet for dashboard
*/
function load_custom_wp_admin_style($hook) {
   if( 'toplevel_page_home_page_settings' != $hook ){
   		return;
   }
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin-style.css', false, '1.0.0' );
    
    wp_register_style( 'bootstrap_admin_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '1.0.0' );

    wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Bitter|Bree+Serif|Domine:700|Hammersmith+One', false );

    wp_register_script('admin-js', get_template_directory_uri() .'/assets/js/admin-js.js', array('jquery'),'1.0.0',true);
    wp_localize_script('admin-js', 'admin_ajax', array('ajaxURL' => admin_url( 'admin-ajax.php' ))); //Localizing AJAX 
    
    wp_enqueue_style( 'custom_wp_admin_css' );
    
    wp_enqueue_style( 'bootstrap_admin_css' );

    wp_enqueue_script('admin-js');

    wp_enqueue_media();

}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );


//Custom Excerpt
add_filter( 'get_the_excerpt', 'wpse162725_ltrim_excerpt' );

function wpse162725_ltrim_excerpt( $excerpt ) {
    return preg_replace( '~^(\s*(?:&nbsp;)?)*~i', '', $excerpt );
}

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return ' ...<p><b class="read-more">Read More</b>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
* Register New Widget Areas
*/

function new_widget_areas_init() {
	$widgetAreas = [
		[
			'name'           =>'Subscribe Sidebar',
			'id'             =>'subscribe_sidebar',
			'description'    => esc_html__( 'This Is For The Subscription Form Sidebar.', 'misfit-foodie' ),
			'before_widget'  =>'<div>',
			'after_widget'   =>'</div>',
			'before_title'   =>'<h2 class="rounded" ',
			'after_title'    =>'</h2>'
		],
		[
			'name'           =>'Popular Recipes Sidebar',
			'id'             =>'popular_recipes_sidebar',
			'description'    => esc_html__( 'This Is For The Popular Recipes Sidebar.', 'misfit-foodie' ),
			'before_widget'  =>'<div>',
			'after_widget'   =>'</div>',
			'before_title'   =>'<h2 class="rounded" ',
			'after_title'    =>'</h2>'
		],
		[
			'name'           =>'Header Subscribe Form',
			'id'             =>'header_subscribe',
			'description'    => esc_html__( 'This Is For The Header Subscription Form.', 'misfit-foodie' ),
			'before_widget'  =>'<div>',
			'after_widget'   =>'</div>',
			'before_title'   =>'<h2 class="rounded" ',
			'after_title'    =>'</h2>'
		],
		[
			'name'           =>'Footer Subscribe Form',
			'id'             =>'footer_subscribe',
			'description'    => esc_html__( 'This Is For The Footer Subscription Form.', 'misfit-foodie' ),
			'before_widget'  =>'<div>',
			'after_widget'   =>'</div>',
			'before_title'   =>'<h2 class="rounded" ',
			'after_title'    =>'</h2>'
		],
		[
			'name'           =>'Single Post About Me',
			'id'             =>'post_about_me',
			'description'    => esc_html__( 'This Is About Me Sidebar For Single Posts.', 'misfit-foodie' ),
			'before_widget'  =>'<div>',
			'after_widget'   =>'</div>',
			'before_title'   =>'<h2 class="rounded" ',
			'after_title'    =>'</h2>'
		]
	];
	foreach($widgetAreas as $widgetArea) {
		register_sidebar( $widgetArea );
	}
}
add_action('widgets_init', 'new_widget_areas_init');


//Build Numbered Navigation on Front Page
function get_page_numbers($cat = ''){
	$postOneID   = esc_attr(get_option('post_one_id')  ); 
	$postTwoID   = esc_attr(get_option('post_two_id')  ); 
	$postThreeID = esc_attr(get_option('post_three_id')  ); 
	
	if($cat) {
		$cat = $cat;
		$postNotIn = '';
	}
	else {
		$cat = '';
		$postNotIn = array($postOneID,$postTwoID,$postThreeID);
	}

	$args = array (
		'post_type'      => 'post',
		'cat'            => $cat,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'post__not_in'   => $postNotIn //Exclude any posts being shown in top 3
	);
	$the_query = new WP_Query( $args );
	
	//total posts to display on front page
	$total = $the_query->found_posts;
	$max   = ceil($total/4);
			 

	echo "<div class='front_posts_navigation'>
			<ul class='front_posts_navigation__ul'>";
			for($i=1;$i<=$max;$i++){
				echo "<li name='$cat' value=$i class='front_posts_navigation__li'>$i</li>";
			}
	echo "</ul></div>";

	/* Restore original Post Data */
	wp_reset_postdata();
}

//Load More Posts On Front Page
function load_more_posts() {
	$value = $_POST['button_number'];
	$cat   = $_POST['cat'];
	$offset = 0;
	//offsetting the number by 4 of posts for the query
	if ($value > 1){
		$offset = $value * 4 - 4;
	}
	set_query_var('offset',$offset);  //Setting offset variable so it's accessible in fp-posts template
	set_query_var('catID',$cat);
	echo get_template_part('template-parts/content','fp-posts'); 
	die();
}
add_action("wp_ajax_load_more_posts", "load_more_posts");
add_action("wp_ajax_nopriv_load_more_posts", "load_more_posts");

/**
* Add a custom link to the end of a specific menu that uses the wp_nav_menu() function
*/
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args){
	$facebookUrl    = esc_attr(get_option('facebookUrl') );
	$pinterestUrl   = esc_attr(get_option('pinterestUrl') );
	$instagramUrl   = esc_attr(get_option('instagramUrl') );
	$facebookImage  = get_template_directory_uri().'/assets/img/facebook-4-32.png';
	$instagramImage = get_template_directory_uri().'/assets/img/instagram-4-32.png';
	$pinterestImage = get_template_directory_uri().'/assets/img/pinterest-4-32.png';
    
    if( $args->theme_location == 'top_header' ){
        $items .="<li class='list-inline-item social-links'><a target='_blank' href='$facebookUrl'><img alt='Partylicious Facebook' src='$facebookImage'></a></li>";
        $items .="<li class='list-inline-item social-links'><a target='_blank' href='$instagramUrl'><img alt='Partylicious Instagram' src='$instagramImage'></a></li>";
        $items .="<li class='list-inline-item social-links'><a target='_blank' href='$pinterestUrl'><img alt='Partylicious Pinterest' src='$pinterestImage'></a></li>";
    }
    return $items;
}

//Get Attachment ID by Image URL
function get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    return $attachment[0];
}

//Add Google Analytics
add_action('wp_head', 'wpb_add_googleanalytics');
function wpb_add_googleanalytics() {
 	// Google Analytics Code

}
 
