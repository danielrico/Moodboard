<?php

// image size
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'moodboard', 800 ); //800 pixels wide (and unlimited height)
}

// register menus
function register_my_menus() {
  register_nav_menus(
    array( 
      'primary_menu' => __( 'Primary menu' ), 
      'secondary_menu' => __( 'Secondary menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// enqueue scripts
function my_scripts_loader() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.11.0.min.js');
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'masonry', get_bloginfo( 'template_directory' ) . '/js/masonry.pkgd.min.js');
    wp_enqueue_script( 'masonry' );
    wp_register_script( 'imagesloaded', get_bloginfo( 'template_directory' ) . '/js/imagesloaded.pkgd.min.js');
    wp_enqueue_script( 'imagesloaded' );
    wp_register_script( 'moodboard', get_bloginfo( 'template_directory' ) . '/js/moodboard.js');
    wp_enqueue_script( 'moodboard' );
}    
add_action('wp_enqueue_scripts', 'my_scripts_loader');

// Category pages pager
function custom_category_posts_per_page( $query ) {
    if ( $query->is_category() && $query->is_main_query() )
        $query->set( 'posts_per_page', 24 );
}
add_action( 'pre_get_posts', 'custom_category_posts_per_page' );

// search form
add_theme_support( 'html5', array( 'search-form' ) );

/* redirect users to front page after login */
function redirect_to_front_page() {
  global $redirect_to;
  if (!isset($_GET['redirect_to'])) {
    $redirect_to = get_option('siteurl');
  }
}
add_action('login_form', 'redirect_to_front_page');

// add user roles
$result = add_role(
    'maps_team',
    __( 'MaPS team' ),
    array(
        'read' => false  // true allows this capability
    )
);
$result = add_role(
    'medias_talents',
    __( 'Medias Talents' ),
    array(
        'read' => false  // true allows this capability
    )
);

?>