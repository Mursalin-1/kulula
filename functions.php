<?php
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'customstyle', get_template_directory_uri().'/css/main.css' );
  wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'script', get_template_directory_uri() . '/js/custom.js');

  if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
	    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
	}

 
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'blog-thumb', 250, 150 );
    add_image_size( 'singleimg', 1180, 500 );
}
function theme_adds(){
	add_theme_support( 'title-tag' );
	register_nav_menus( [ 'primary' => __( 'Primary Menu' , 't_theme') ] );

}
add_action('after_setup_theme', 'theme_adds');

function wp_title_filter_callback($title, $sep){
	global $paged, $page;
	if(is_feed())
		return $title;
	$title .= get_bloginfo('name');

	$site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
 
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 't_theme' ), max( $paged, $page ) );
 
    return $title;

}
add_filter('wp_title', 'wp_title_filter_callback', 10,2);

$args = array(
	'width'         => 980,
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

add_theme_support( 'custom-background' );

function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


function initialize_widgets(){
	register_sidebar([
		'name'=> 'Right Sidebar',
		'id'=> 'rightsidebar',
		'before_widget' => '<div class="widget-item">',
		'after_widget'  => '</div>'
	]);
}
add_action('widgets_init','initialize_widgets');

//settings API
require_once('themeOptions.php');