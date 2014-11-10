<?php
/**
 *Marti & Liz functions and definitions
 *
 * @package Marti & Liz
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'marti_and_lizsetup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function marti_and_liz_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based onMarti & Liz, use a find and replace
	 * to change'marti-and-liz'to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'marti-and-liz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu','marti-and-liz' ),
		'social' => __( 'Social Links','marti-and-liz' )
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

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'marti_and_liz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // marti_and_liz_setup
add_action( 'after_setup_theme', 'marti_and_liz_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function marti_and_liz_widgets_init() {
	register_sidebar( array(
			'name'			=> __( 'Sidebar','marti-and-liz'),
			'id'			=> 'sidebar-1',
			'description'	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h1 class="widget-title"><span>',
			'after_title'	=> '</span></h1>',
	) );
	register_sidebar( array(
			'name'			=> __( 'Footer Left','marti-and-liz'),
			'id'			=> 'footer-left',
			'description'	=> '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h1 class="widget-title">',
			'after_title'	=> '</h1>',
	) );
}
add_action( 'widgets_init', 'marti_and_liz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function marti_and_liz_scripts() {
	wp_enqueue_style( 'marti-and-liz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'marti-and-liz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'marti-and-liz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'marti_and_liz_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Customize footer
 */
function custom_footer_left() {

	dynamic_sidebar( 'footer-left' );

} // custom_footer_left()
add_action( 'footer_left', 'custom_footer_left' );

function custom_site_info() {

	printf( __( '<div class="copyright">&copy %1$s <a href="%2$s" title="Login">%3$s</a></a></div>', 'marti-and-liz' ), date( 'Y' ), get_admin_url(), get_bloginfo( 'name' ) );
	echo '123 ABC St<br />Nashville, TN 37201<br />';
	printf( __( '<a href="tel:%1$s">%1$s</a>' , 'marti-and-liz' ), '615-555-5555' );

} // custom_site_info()
add_action( 'site_info', 'custom_site_info' );

function custom_footer_right() {

	get_template_part( 'menu', 'social' );

} // custom_footer_right()
add_action( 'footer_right', 'custom_footer_right' );


/**
 * Load Fonts
 */
function load_fonts() {

	wp_register_style( 'fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome' );

	wp_register_style( 'et-googleFonts', 'http://fonts.googleapis.com/css?family=Muli' );
	wp_enqueue_style( 'et-googleFonts' );

} // load_fonts()
add_action( 'wp_print_styles', 'load_fonts' );



function pretty( $input ) {

	echo '<pre>'; print_r( $input ); echo '</pre>';

} // pretty()



/**
 * Changes the text at the top of the SimpleMap Search Form
 * 
 * @param 	array 		$atts 		The current attribute array
 * 
 * @return 	array       			The modified attribute array
 */
function change_search_text( $atts ) {

	$atts['search_title'] = ' Find your store';

	return $atts;

} // change_search_text()
add_filter( 'sm-default-shortcode-atts', 'change_search_text', 10, 1 );



/**
 * Changes the text on the search button
 * 
 * @return 	string       	The modified search button text
 */
function change_button_text() {

	return 'Find';

} // change_button_text()
add_filter( 'sm-search-label-search', 'change_button_text', 10 );



/**
 * Changes the text on the Zip Code field label
 * 
 * @return 	string       	The modified text
 */
function change_zip_text() {

	return 'Zip';

} // change_zip_text()
add_filter( 'sm-search-label-zip', 'change_zip_text', 10 );



/**
 * Removes everything from the pre-existing SimpleMap single location template
 * 
 * @param 	mixed 		$temp 		The current SimpleMap single location template
 * 
 * @return 	null
 */
function blank_template( $temp ) {

	return '';

} // blank_template()
add_filter( 'sm-single-location-default-template', 'blank_template', 10, 1 );



/**
 * Creates a Post category when a SimpleMap Location is published
 * 
 * @param 	int 		$post_id 		The ID of the post being published
 * @param 	obj 		$post 			The Post object
 * @param 	? 			$update 		No idea
 * 
 * @return 	void
 */
function create_location_category( $post_id, $post, $update ) {

	if ( 'sm-location' !== $post->post_type ) { return; }
	if ( wp_is_post_revision( $post_id ) ) { return; }
	if ( wp_is_post_autosave( $post_id ) ) { return; }

	$status = get_post_status( $post_id );

	if ( 'auto-draft' == $status || 'draft' == $status || 'pending' == $status || 'future' == $status ) { return; }

	$exists = term_exists( $post->post_title, 'category' );

	if ( $exists !== 0 && $exists !== null ) { return; }

	wp_insert_term( $post->post_title, 'category', array( 'description' => 'News about the ' . $post->post_title . ' store.', 'slug' => $post->post_name ) );

	//wp_die( pretty( $post ) );

} // create_location_category()
add_action( 'save_post', 'create_location_category', 10, 3 );



/**
 * Removes a Post category when a SimpleMap Location is permanently deleted
 * 
 * @param 	int 		$postID 		The ID of the post being deleted
 * 
 * @return 	void
 */
function remove_location_category( $postID ) {

	$post = get_post( $postID );

	if ( 'sm-location' !== $post->post_type ) { return; }

	$term = get_term_by( 'slug', $post->post_name, 'category' );

	//wp_die( pretty( $term ) );

	settype( $term->term_id, 'int' );

	wp_delete_term( $term->term_id, 'category' );

} // remove_location_category()
add_action( 'before_delete_post', 'remove_location_category', 10, 1 );



/**
 * Performs a WordPress Query for posts in a particular category
 *
 * @uses 	WP_Query()
 *
 * @return  object 				A query object containing the results of the query
 */
function get_category_posts( $category, $quantity = 10, $paged = 1 ) {

	$args['category_name'] 	= $category;
	$args['order']			= 'ASC';
	$args['paged'] 			= $paged;
	$args['posts_per_page'] = $quantity;
	$args['post_type'] 		= 'post';
	
	$query = new WP_Query( $args );

	return $query;

} // End of get_category_posts()



/**
 * Echos the post slug
 *
 * @link http://www.tcbarrett.com/2011/09/wordpress-the_slug-get-post-slug-function/#.VF2EU1PF8qg
 * 
 * @param 	int 		$postID 		The post ID
 *
 * @uses 	get_the_slug()
 * 
 * @return 	string 						The slug of the post
 */
function the_slug( $postID ) {
	
	$slug = get_the_slug( $postID );

	echo $slug;
	
} // the_slug()

/**
 * Returns the post slug
 *
 * @link http://www.tcbarrett.com/2011/09/wordpress-the_slug-get-post-slug-function/#.VF2EU1PF8qg
 * 
 * @param 	int 		$postID 		The post ID
 *
 * @uses 	get_permalink()
 * @uses 	do_action()
 * @uses 	apply_filters()
 * 
 * @return 	string 						The slug of the post
 */
function get_the_slug( $postID ) {

	$slug = basename( get_permalink( $postID ) );

	do_action( 'before_slug', $slug );

	$slug = apply_filters( 'slug_filter', $slug );
	
	do_action( 'after_slug', $slug );
	
	return $slug;

} // get_the_slug()

function get_svg( $svg ) {

	$output = '';

	switch ( $svg ) {

		case 'facebook' 	: $output .= ''; break;
		case 'logo' 		: $output .= '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 301.2 97.8" enable-background="new 0 0 301.2 97.8" xml:space="preserve"><path fill="#E31B23" d="M210.2 23.9c-1.5 0.1-3 0.4-4.6 0.9 -1.5 0.5-2.7 1.2-3.5 2.2 -0.5 0.6-1.1 1.5-1.6 2.7 -0.5 1.2-1.2 2.6-2 4.2 -0.8 1.6-1.5 3.2-2.3 4.8 -0.8 1.6-1.8 3.2-3.1 4.7 1 1.2 2.3 2.6 3.7 4 1.5 1.4 2.7 2.5 3.8 3.1 1 0.6 2.5 1.1 4.3 1.5 1.9 0.4 3.4 0.6 4.6 0.7v2.7h-15.8l-5.7-6.5c-0.8 0.9-1.8 1.9-2.9 2.9 -1.1 1-2.2 1.8-3.4 2.5 -1.3 0.8-2.7 1.4-4 1.8 -1.3 0.4-2.9 0.7-4.7 0.7 -1.9 0-3.8-0.3-5.6-0.8 -1.9-0.5-3.6-1.4-5.1-2.6 -1.5-1.2-2.7-2.7-3.6-4.5 -0.9-1.8-1.4-4-1.4-6.6 0-3.2 0.8-6 2.5-8.6 1.7-2.6 4.8-5.3 9.4-8.2 -2.1-2.7-3.7-5.1-4.8-7.1 -1.1-2-1.7-4.2-1.7-6.7 0-1.8 0.3-3.4 1.1-4.8 0.7-1.5 1.7-2.7 3-3.8 1.2-1 2.6-1.8 4.3-2.3 1.7-0.6 3.4-0.8 5.1-0.8 2 0 3.8 0.3 5.4 1 1.5 0.6 2.8 1.5 3.8 2.5 0.9 1 1.6 2.1 2 3.4 0.5 1.3 0.7 2.6 0.7 3.8 0 3.1-0.9 5.7-2.8 7.9 -1.9 2.2-4.5 4.2-7.8 6 2.4 3.2 4.7 6.2 7 8.9 2.3 2.7 4.5 5.3 6.6 7.9 1.7-2.7 3-5.3 4-7.7 0.9-2.4 1.4-4.5 1.4-6.4 0-0.8-0.6-1.5-1.8-1.9 -1.2-0.5-2.8-0.9-4.9-1.4v-2.7h20.5V23.9zM186.1 46.9c-2.4-3-5-6.3-8-9.9 -3-3.6-5.4-6.6-7.1-9.1 -2.1 1.4-3.5 3.1-4.4 5 -0.9 1.9-1.3 4.1-1.3 6.6 0 3.5 1 6.3 3 8.6 2 2.3 4.6 3.4 7.9 3.4 1.9 0 3.7-0.4 5.5-1.2C183.5 49.6 184.9 48.4 186.1 46.9zM183.1 11.5c0-2.6-0.6-4.6-1.7-6 -1.1-1.4-2.8-2.1-4.9-2.1 -1.2 0-2.2 0.2-3 0.7 -0.8 0.5-1.5 1.1-2 1.8 -0.5 0.7-0.9 1.5-1.1 2.3 -0.2 0.8-0.3 1.5-0.3 2.2 0 1.8 0.5 3.5 1.4 5.3 0.9 1.8 2.3 4 4.3 6.5 2.6-1.5 4.5-3.1 5.7-4.8C182.5 15.8 183.1 13.8 183.1 11.5z"/><path d="M52.9 55.1H34v-2.3c0.7 0 1.6-0.1 2.6-0.2 1.1-0.1 1.8-0.3 2.2-0.5 0.6-0.4 1.1-0.9 1.4-1.4 0.3-0.5 0.4-1.2 0.4-2V16h-0.5L25.6 54.4h-1.5L10.3 15.2H9.9v26.9c0 2.6 0.2 4.6 0.5 5.9 0.3 1.4 0.8 2.3 1.4 2.9 0.4 0.4 1.4 0.9 2.7 1.3 1.4 0.4 2.3 0.6 2.7 0.6v2.3H0v-2.3c0.9-0.1 1.8-0.2 2.8-0.5 1-0.2 1.8-0.6 2.3-1 0.7-0.6 1.2-1.5 1.4-2.7C6.8 47.4 7 45.3 7 42.4V19.4c0-1.3-0.1-2.4-0.5-3.3 -0.3-0.8-0.7-1.5-1.3-2.1 -0.6-0.6-1.4-1-2.3-1.3 -0.9-0.3-1.8-0.4-2.7-0.5V10h14.5L27 43.9l10.4-28.3c0.4-1 0.7-2.1 1-3.3 0.3-1.1 0.4-1.9 0.4-2.3h13.9v2.3c-0.6 0-1.3 0.1-2.2 0.3 -0.9 0.2-1.5 0.3-1.9 0.5 -0.7 0.3-1.1 0.7-1.4 1.3 -0.2 0.6-0.4 1.2-0.4 1.9v32.5c0 0.7 0.1 1.4 0.4 1.9 0.2 0.5 0.7 1 1.4 1.3 0.4 0.2 1 0.4 1.9 0.6 0.9 0.2 1.7 0.3 2.2 0.3V55.1zM84.9 54.5c-0.9 0.4-1.8 0.7-2.5 0.9 -0.7 0.2-1.5 0.3-2.4 0.3 -1.6 0-2.8-0.4-3.7-1.2 -0.9-0.8-1.5-1.9-1.8-3.4h-0.2c-1.3 1.5-2.7 2.7-4.2 3.5 -1.5 0.8-3.3 1.2-5.4 1.2 -2.2 0-4.1-0.7-5.5-2.2 -1.4-1.4-2.1-3.3-2.1-5.7 0-1.2 0.2-2.3 0.5-3.2 0.3-1 0.8-1.8 1.4-2.6 0.5-0.6 1.2-1.2 2-1.7 0.8-0.5 1.6-0.9 2.3-1.2 0.9-0.4 2.7-1 5.5-2 2.8-1 4.6-1.7 5.6-2.3v-3.1c0-0.3-0.1-0.8-0.2-1.6 -0.1-0.8-0.3-1.5-0.7-2.2 -0.4-0.8-1-1.5-1.7-2.1 -0.7-0.6-1.8-0.9-3.1-0.9 -0.9 0-1.8 0.2-2.6 0.5 -0.8 0.3-1.3 0.7-1.7 1 0 0.4 0.1 1.1 0.3 1.9 0.2 0.8 0.3 1.6 0.3 2.3 0 0.7-0.3 1.4-0.9 2 -0.6 0.6-1.5 0.9-2.6 0.9 -1 0-1.7-0.4-2.2-1.1 -0.5-0.8-0.7-1.6-0.7-2.5 0-1 0.3-1.9 1-2.8 0.6-0.9 1.5-1.7 2.5-2.4 0.9-0.6 2-1.1 3.3-1.5 1.3-0.4 2.5-0.6 3.8-0.6 1.7 0 3.2 0.1 4.4 0.4 1.3 0.2 2.4 0.8 3.4 1.6 1 0.8 1.8 1.8 2.3 3.2 0.5 1.3 0.8 3.1 0.8 5.2 0 3 0 5.7-0.1 8.1 -0.1 2.3-0.1 4.9-0.1 7.7 0 0.8 0.1 1.5 0.4 2 0.3 0.5 0.7 0.9 1.2 1.2 0.3 0.2 0.8 0.3 1.4 0.3 0.6 0 1.3 0 2 0V54.5zM74.4 37.8c-1.7 0.5-3.2 1-4.5 1.6 -1.3 0.5-2.5 1.1-3.6 1.9 -1 0.7-1.8 1.6-2.4 2.6 -0.6 1-0.9 2.2-0.9 3.5 0 1.8 0.4 3.1 1.3 3.9 0.9 0.8 2 1.2 3.3 1.2 1.4 0 2.7-0.4 3.8-1.1 1.1-0.7 2-1.6 2.7-2.6L74.4 37.8zM110.5 27.8c0 1.1-0.3 2-0.8 2.9 -0.5 0.8-1.3 1.3-2.3 1.3 -1.1 0-2-0.3-2.6-0.9 -0.6-0.6-0.9-1.3-0.9-2 0-0.5 0-0.9 0.1-1.3 0.1-0.4 0.1-0.8 0.2-1.1 -0.9 0-2 0.4-3.3 1.2 -1.3 0.8-2.3 1.9-3.2 3.4v18.2c0 0.7 0.1 1.3 0.4 1.8 0.3 0.5 0.7 0.8 1.3 1 0.5 0.2 1.1 0.4 1.9 0.5 0.8 0.1 1.5 0.2 2.1 0.2v2.1H87.8V53c0.5 0 0.9-0.1 1.4-0.1 0.5 0 0.9-0.1 1.3-0.2 0.6-0.2 1-0.5 1.2-1 0.3-0.5 0.4-1.1 0.4-1.9V30.4c0-0.7-0.1-1.3-0.4-1.9 -0.3-0.6-0.7-1.1-1.2-1.5 -0.4-0.3-0.8-0.4-1.4-0.6 -0.5-0.1-1.1-0.2-1.7-0.2v-2.1l9.9-0.7 0.4 0.4v4.4h0.2c1.2-1.7 2.6-3 4.1-3.9 1.5-0.9 2.9-1.3 4.2-1.3 1.3 0 2.3 0.4 3.1 1.3C110.1 25.2 110.5 26.3 110.5 27.8zM133.4 53.7c-1.3 0.6-2.5 1.1-3.7 1.4 -1.2 0.4-2.6 0.6-4.3 0.6 -2.5 0-4.2-0.7-5.2-2 -1-1.3-1.5-3.2-1.5-5.6V26.9h-5.4v-3h5.5v-9.8h5.5v9.8h8.5v3h-8.5v17.5c0 1.3 0 2.4 0.1 3.3 0.1 0.9 0.3 1.6 0.6 2.3 0.3 0.6 0.8 1.1 1.4 1.4s1.5 0.5 2.6 0.5c0.5 0 1.2 0 2.2-0.1 1-0.1 1.7-0.2 2.1-0.4V53.7zM151.8 55.1h-14.3V53c0.5 0 0.9-0.1 1.4-0.1 0.5 0 0.9-0.1 1.3-0.2 0.6-0.2 1-0.5 1.2-1 0.3-0.5 0.4-1.1 0.4-1.9V30.4c0-0.7-0.1-1.3-0.4-1.9 -0.3-0.6-0.7-1-1.2-1.4 -0.4-0.3-0.9-0.5-1.7-0.7 -0.7-0.2-1.4-0.3-2-0.3v-2.1l10.5-0.7 0.4 0.4v25.5c0 0.7 0.1 1.4 0.4 1.8 0.3 0.5 0.7 0.8 1.3 1.1 0.4 0.2 0.9 0.3 1.3 0.5 0.4 0.1 0.9 0.2 1.4 0.2V55.1z"/><circle cx="143.7" cy="12.2" r="4.2"/><path d="M252.8 42.5l-1 13.4h-35.2v-2.3c0.5 0 1.2-0.1 2.2-0.2 1-0.1 1.6-0.2 2-0.4 0.6-0.3 1.1-0.7 1.4-1.2 0.3-0.5 0.4-1.2 0.4-2V17.5c0-0.7-0.1-1.4-0.4-1.9 -0.2-0.6-0.7-1-1.4-1.3 -0.5-0.3-1.2-0.5-2-0.7 -0.9-0.2-1.6-0.4-2.2-0.4v-2.3h19v2.3c-0.6 0-1.4 0.1-2.3 0.3 -0.9 0.2-1.6 0.4-2 0.5 -0.7 0.3-1.2 0.7-1.5 1.3 -0.3 0.6-0.4 1.3-0.4 2v30.3c0 1.4 0.1 2.5 0.2 3.3 0.1 0.8 0.5 1.4 1 1.8 0.5 0.4 1.2 0.6 2.2 0.8 1 0.1 2.3 0.2 4 0.2 0.8 0 1.6 0 2.4-0.1 0.8 0 1.7-0.1 2.4-0.3 0.7-0.1 1.4-0.3 2-0.5 0.6-0.2 1.1-0.5 1.4-0.8 0.9-1 1.9-2.5 3-4.4 1.2-2 2-3.6 2.4-4.8H252.8zM271.2 55.9h-15.1v-2.1c0.5 0 1-0.1 1.5-0.1 0.5 0 1-0.1 1.4-0.3 0.6-0.2 1-0.5 1.3-1 0.3-0.5 0.4-1.1 0.4-1.9V31.2c0-0.7-0.2-1.3-0.5-1.9 -0.3-0.6-0.7-1-1.3-1.4 -0.4-0.3-1-0.5-1.7-0.7 -0.8-0.2-1.5-0.3-2.1-0.3v-2.1l11.1-0.7 0.4 0.4v25.5c0 0.7 0.1 1.4 0.4 1.8 0.3 0.5 0.7 0.8 1.3 1.1 0.5 0.2 0.9 0.3 1.4 0.5 0.4 0.1 0.9 0.2 1.5 0.2V55.9zM301 55.9h-25.3v-1.7l17.8-27.1H289c-1.8 0-3.3 0-4.3 0.1 -1 0.1-2 0.3-2.9 0.6 -0.6 0.2-1.1 0.9-1.7 2 -0.5 1.1-1 2.5-1.4 4.3h-1.9v-9.6h23.9v1.3l-18 27.4c0.8 0 1.6 0 2.5 0 0.9 0 1.9 0 3 0 0.8 0 1.7 0 2.7 0 0.9 0 2.1-0.1 3.5-0.2 0.8 0 1.5-0.3 1.9-0.9 0.4-0.5 0.8-1.1 1-1.8 0.2-0.6 0.5-1.5 0.8-2.5 0.3-1.1 0.6-2.1 0.9-3.1h1.9V55.9zM267.6 13c0 2.3-1.9 4.2-4.2 4.2 -2.3 0-4.2-1.9-4.2-4.2 0-2.3 1.9-4.2 4.2-4.2C265.7 8.8 267.6 10.6 267.6 13z"/><path fill="#6D6E71" d="M88.6 93c0.5 0.8 1.1 1.3 1.9 1.7 0.8 0.4 1.6 0.5 2.4 0.5 0.5 0 0.9-0.1 1.4-0.2 0.5-0.1 0.9-0.4 1.3-0.7 0.4-0.3 0.7-0.7 1-1.1 0.2-0.4 0.4-0.9 0.4-1.5 0-0.8-0.3-1.4-0.8-1.8 -0.5-0.4-1.1-0.8-1.9-1 -0.7-0.3-1.6-0.6-2.4-0.8 -0.9-0.3-1.7-0.6-2.4-1.1 -0.7-0.5-1.4-1.1-1.9-1.9 -0.5-0.8-0.8-1.8-0.8-3.2 0-0.6 0.1-1.2 0.4-1.9 0.3-0.7 0.7-1.3 1.2-1.9 0.6-0.6 1.3-1 2.2-1.4 0.9-0.4 1.9-0.6 3.2-0.6 1.1 0 2.2 0.2 3.2 0.5 1 0.3 1.9 0.9 2.7 1.9l-2.3 2.1c-0.4-0.5-0.8-1-1.5-1.3 -0.6-0.3-1.4-0.5-2.2-0.5 -0.8 0-1.4 0.1-1.9 0.3 -0.5 0.2-0.9 0.5-1.2 0.8 -0.3 0.3-0.5 0.7-0.7 1 -0.1 0.4-0.2 0.7-0.2 1 0 0.9 0.2 1.5 0.8 2 0.5 0.5 1.1 0.8 1.9 1.1 0.8 0.3 1.6 0.6 2.4 0.8 0.9 0.2 1.7 0.6 2.4 1 0.7 0.4 1.4 1 1.9 1.7 0.5 0.7 0.8 1.7 0.8 2.9 0 1-0.2 1.9-0.6 2.7 -0.4 0.8-0.9 1.5-1.5 2 -0.6 0.5-1.4 1-2.3 1.2 -0.9 0.3-1.8 0.4-2.8 0.4 -1.3 0-2.6-0.2-3.8-0.7 -1.2-0.5-2.1-1.2-2.8-2.2L88.6 93zM112.9 76.6h2.8v8.6h10.7v-8.6h2.8v20.6h-2.8v-9.4h-10.7v9.4h-2.8V76.6zM152.6 97.8c-1.6 0-3-0.3-4.3-0.8 -1.3-0.6-2.4-1.3-3.4-2.3 -0.9-1-1.7-2.1-2.2-3.4 -0.5-1.3-0.8-2.7-0.8-4.3 0-1.5 0.3-3 0.8-4.3 0.5-1.3 1.3-2.5 2.2-3.4 0.9-1 2.1-1.7 3.4-2.3 1.3-0.6 2.8-0.8 4.3-0.8 1.6 0 3 0.3 4.3 0.8 1.3 0.5 2.5 1.3 3.4 2.3 0.9 1 1.7 2.1 2.2 3.4 0.5 1.3 0.8 2.7 0.8 4.3 0 1.5-0.3 3-0.8 4.3 -0.5 1.3-1.3 2.5-2.2 3.4 -0.9 1-2.1 1.7-3.4 2.3C155.7 97.5 154.2 97.8 152.6 97.8zM152.6 95.2c1.2 0 2.3-0.2 3.2-0.7 1-0.4 1.8-1 2.4-1.8 0.7-0.7 1.2-1.6 1.6-2.6 0.4-1 0.6-2.1 0.6-3.2 0-1.1-0.2-2.2-0.6-3.2 -0.4-1-0.9-1.9-1.6-2.6 -0.7-0.7-1.5-1.3-2.4-1.8 -1-0.4-2-0.7-3.2-0.7 -1.2 0-2.2 0.2-3.2 0.7 -0.9 0.4-1.8 1-2.4 1.8 -0.7 0.7-1.2 1.6-1.6 2.6 -0.4 1-0.6 2.1-0.6 3.2 0 1.1 0.2 2.2 0.6 3.2 0.4 1 0.9 1.9 1.6 2.6 0.7 0.7 1.5 1.3 2.4 1.8C150.4 94.9 151.5 95.2 152.6 95.2zM175.1 76.6h13.3v2.6h-10.5v6.1h9.8V88h-9.8v6.6h11v2.6h-13.8V76.6zM202.2 93c0.5 0.8 1.1 1.3 1.9 1.7 0.8 0.4 1.6 0.5 2.4 0.5 0.5 0 0.9-0.1 1.4-0.2 0.5-0.1 0.9-0.4 1.3-0.7 0.4-0.3 0.7-0.7 1-1.1 0.3-0.4 0.4-0.9 0.4-1.5 0-0.8-0.3-1.4-0.8-1.8 -0.5-0.4-1.1-0.8-1.9-1 -0.7-0.3-1.6-0.6-2.4-0.8 -0.9-0.3-1.7-0.6-2.4-1.1 -0.7-0.5-1.4-1.1-1.9-1.9 -0.5-0.8-0.8-1.8-0.8-3.2 0-0.6 0.1-1.2 0.4-1.9 0.3-0.7 0.7-1.3 1.2-1.9 0.6-0.6 1.3-1 2.2-1.4 0.9-0.4 1.9-0.6 3.2-0.6 1.1 0 2.2 0.2 3.2 0.5 1 0.3 1.9 0.9 2.7 1.9l-2.3 2.1c-0.3-0.5-0.8-1-1.5-1.3 -0.6-0.3-1.4-0.5-2.2-0.5 -0.8 0-1.4 0.1-1.9 0.3 -0.5 0.2-0.9 0.5-1.2 0.8 -0.3 0.3-0.5 0.7-0.7 1 -0.1 0.4-0.2 0.7-0.2 1 0 0.9 0.3 1.5 0.8 2 0.5 0.5 1.1 0.8 1.9 1.1 0.7 0.3 1.6 0.6 2.4 0.8 0.9 0.2 1.7 0.6 2.4 1 0.7 0.4 1.4 1 1.9 1.7 0.5 0.7 0.8 1.7 0.8 2.9 0 1-0.2 1.9-0.6 2.7 -0.4 0.8-0.9 1.5-1.5 2 -0.6 0.5-1.4 1-2.3 1.2 -0.9 0.3-1.8 0.4-2.8 0.4 -1.3 0-2.6-0.2-3.8-0.7 -1.2-0.5-2.1-1.2-2.8-2.2L202.2 93z"/><line fill="none" stroke="#6D6E71" stroke-width="2.5" stroke-miterlimit="10" x1="224.8" y1="87.4" x2="301.2" y2="87.4"/><line fill="none" stroke="#6D6E71" stroke-width="2.5" stroke-miterlimit="10" x1="1.4" y1="87.4" x2="72.1" y2="87.4"/></svg>'; break;
		case 'pinterest' 	: $output .= ''; break;
		case 'youtube' 		: $output .= ''; break;

	} // switch

	return $output;

} // get_svg()

