<?php
/**
 * isi-test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package isi-test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'isi_test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function isi_test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on isi-test, use a find and replace
		 * to change 'isi-test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'isi-test', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'isi-test' ),
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
				'isi_test_custom_background_args',
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
add_action( 'after_setup_theme', 'isi_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function isi_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'isi_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'isi_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function isi_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'isi-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'isi-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'isi_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function isi_test_scripts() {
	wp_enqueue_style( 'isi-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'isi-test-style', 'rtl', 'replace' );

	wp_register_style('style', get_template_directory_uri() . '/css/style.css', [], 1, 'all');
    wp_enqueue_style('style');

    wp_register_script('select-styling', get_template_directory_uri() . '/js/select-styling.js', [], 1, true);
    wp_enqueue_script('select-styling');

    wp_register_script('form-popup', get_template_directory_uri() . '/js/form-popup.js', [], 1, true);
    wp_enqueue_script('form-popup');

    $ajax_param = array('ajaxurl' => admin_url('admin-ajax.php'));

    wp_enqueue_script( 'update-form-user', get_stylesheet_directory_uri() . '/js/update-form-user.js', array('jquery'));
    wp_localize_script('update-form-user', 'myPlugin', $ajax_param);
    
}
add_action( 'wp_enqueue_scripts', 'isi_test_scripts' );

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

//creating a table for testing task

global $wpdb;
$table_name = $wpdb->get_blog_prefix() . 'isi_users';
$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
$sql = "CREATE TABLE {$table_name} (
    id int(11) unsigned NOT NULL auto_increment,
    user_name varchar(255) NOT NULL,
    first_name VArCHAR(255) NOT NULL,
    last_name VArCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY  (id)
) {$charset_collate};";

// Создать таблицу.
dbDelta( $sql );

function get_isi_users() {
    global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';

    $users = $wpdb->get_results(
    	"SELECT * FROM {$table_name} ;"
    );
    return $users;
}

// check for unique username

function find_user_name ($username) {
	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
    $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE user_name = %s", $username);

    $name = $wpdb->get_col($sql);

    if ($name) {
    	return true;
    } else {
    	return false;
    }
}

function email_exist ($email) {

	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
    $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE email = %s", $email);

    $base_email = $wpdb->get_col($sql);

    if ($base_email) {
    	return true;
    } else {
    	return false;
    }
}

function validate_password ($str) {

	if (preg_match('/[A-zA-я]+/', $str)) 
		if (preg_match('/[0-9]+/', $str)) 
			return true;
		else 
			return false;
	else 
		return false;
}

function upload_user ($user) {
	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
    $data = [
    	'user_name' => $user['user-name'],
    	'first_name' => $user['first-name'],
    	'last_name' => $user['last-name'],
    	'email' => $user['email'],
    	'type' => $user['type'],
    	'password' => password_hash($user['password'], PASSWORD_DEFAULT)
    ];

    $result = $wpdb->insert($table_name, $data);
    return $result;
}

function delete_user_by_id ($id) {

	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
    $wpdb->delete($table_name, ['id' => $id]);
}

add_action('wp_ajax_delete_user', 'delete_user');
add_action('wp_ajax_nopriv_delete_user', 'delete_user');

function delete_user () {
	
	$id = $_POST['deleteUserId'];
	delete_user_by_id ($id);
}

add_action('wp_ajax_get_user', 'get_user');
add_action('wp_ajax_nopriv_get_user', 'get_user');

function get_user () {

	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
	$user_id = $_POST['userid'];
	
	$update_user = $wpdb->get_row("
		SELECT * FROM $table_name WHERE id = $user_id");

	include (locate_template('template-parts/content-update-user.php'));

    wp_die();
}

add_action('wp_ajax_edit_user', 'edit_user');
add_action('wp_ajax_nopriv_edit_user', 'edit_user');

function edit_user {

	global $wpdb;
    $table_name = $wpdb->get_blog_prefix() . 'isi_users';
    $user_id = $_POST['editUserId'];
    $data = [
    ];


}




