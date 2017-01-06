<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'footer_navigation' => __('Footer Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page(),
    is_single(),
    is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', false);
  //return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
 // wp_enqueue_style( 'sage_css', asset_path( 'styles/font.css' ), false, null );
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
  //wp_enqueue_script('sage/js', Assets\asset_path('scripts/accordian.js'), ['jquery'], null, true);
  wp_enqueue_script( 'accordion-js', get_template_directory_uri() . '/assets/scripts/accordion.js', ['jquery'], null, true );
  wp_enqueue_script( 'fixnav-js', get_template_directory_uri() . '/assets/scripts/fixnav.js', ['jquery'], null, true );
  //wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?sensor=true&api=AIzaSyDFst6zYCt1oQ8VUZN7PF4k5e62KgcCjwE', ['jquery'], null, true);
  //wp_enqueue_script('maps', get_template_directory_uri().'/assets/scripts/gmaps.js', ['jquery'], null, true);
  wp_enqueue_script( 'google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3', true );
  wp_enqueue_script( 'google-map-init', get_template_directory_uri() . '/assets/scripts/ecomap.js', array('google-map', 'jquery'), '0.1', true );

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


//Add Option page for ACF
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
      'page_title' => 'Theme General Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
      'redirect' => false
  ));

  acf_add_options_sub_page(array(
      'page_title' => 'Home Settings',
      'menu_title' => 'Home Settings',
      'parent_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
  ));
  acf_add_options_sub_page(array(
      'page_title' => 'Social Media Settings',
      'menu_title' => 'Social Media Settings',
      'parent_slug' => 'theme-general-settings',
      'capability' => 'edit_posts',
  ));
}

// Register Custom Post Type
function Team() {

  $labels = array(
      'name'                  => _x( 'Team', 'Post Type General Name', 'Teams' ),
      'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'Teams' ),
      'menu_name'             => __( 'Team', 'Teams' ),
      'name_admin_bar'        => __( 'Team', 'Teams' ),
      'archives'              => __( 'Item Archives', 'Teams' ),
      'parent_item_colon'     => __( 'Parent Item:', 'Teams' ),
      'all_items'             => __( 'All Items', 'Teams' ),
      'add_new_item'          => __( 'Add New Item', 'Teams' ),
      'add_new'               => __( 'Add New', 'Teams' ),
      'new_item'              => __( 'New Item', 'Teams' ),
      'edit_item'             => __( 'Edit Item', 'Teams' ),
      'update_item'           => __( 'Update Item', 'Teams' ),
      'view_item'             => __( 'View Item', 'Teams' ),
      'search_items'          => __( 'Search Item', 'Teams' ),
      'not_found'             => __( 'Not found', 'Teams' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'Teams' ),
      'featured_image'        => __( 'Featured Image', 'Teams' ),
      'set_featured_image'    => __( 'Set featured image', 'Teams' ),
      'remove_featured_image' => __( 'Remove featured image', 'Teams' ),
      'use_featured_image'    => __( 'Use as featured image', 'Teams' ),
      'insert_into_item'      => __( 'Insert into item', 'Teams' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'Teams' ),
      'items_list'            => __( 'Items list', 'Teams' ),
      'items_list_navigation' => __( 'Items list navigation', 'Teams' ),
      'filter_items_list'     => __( 'Filter items list', 'Teams' ),
  );
  $args = array(
      'label'                 => __( 'Team', 'Teams' ),
      'description'           => __( 'Show Team', 'Teams' ),
      'labels'                => $labels,
      'supports'              => array('title'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
  );
  register_post_type( 'team', $args );

  $labels = array(
      'name'                  => _x( 'FAQ', 'Post Type General Name', 'Teams' ),
      'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'Teams' ),
      'menu_name'             => __( 'FAQ', 'Teams' ),
      'name_admin_bar'        => __( 'FAQ', 'Teams' ),
      'archives'              => __( 'Item Archives', 'Teams' ),
      'parent_item_colon'     => __( 'Parent Item:', 'Teams' ),
      'all_items'             => __( 'All Items', 'Teams' ),
      'add_new_item'          => __( 'Add New Item', 'Teams' ),
      'add_new'               => __( 'Add New', 'Teams' ),
      'new_item'              => __( 'New Item', 'Teams' ),
      'edit_item'             => __( 'Edit Item', 'Teams' ),
      'update_item'           => __( 'Update Item', 'Teams' ),
      'view_item'             => __( 'View Item', 'Teams' ),
      'search_items'          => __( 'Search Item', 'Teams' ),
      'not_found'             => __( 'Not found', 'Teams' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'Teams' ),
      'featured_image'        => __( 'Featured Image', 'Teams' ),
      'set_featured_image'    => __( 'Set featured image', 'Teams' ),
      'remove_featured_image' => __( 'Remove featured image', 'Teams' ),
      'use_featured_image'    => __( 'Use as featured image', 'Teams' ),
      'insert_into_item'      => __( 'Insert into item', 'Teams' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'Teams' ),
      'items_list'            => __( 'Items list', 'Teams' ),
      'items_list_navigation' => __( 'Items list navigation', 'Teams' ),
      'filter_items_list'     => __( 'Filter items list', 'Teams' ),
  );
  $args = array(
      'label'                 => __( 'FAQ', 'Teams' ),
      'description'           => __( 'Show FAQ', 'Teams' ),
      'labels'                => $labels,
      'supports'              => array('title'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
  );
  register_post_type( 'faq', $args );

}

add_action( 'init', __NAMESPACE__ . '\\Team', 0 );


function eco_filter_category_title($title) {
  return str_replace('Category: ', '', $title);
}
add_filter('get_the_archive_title', __NAMESPACE__ . '\\eco_filter_category_title');