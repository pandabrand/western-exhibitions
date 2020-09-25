<?php
/*
Plugin Name: Western Exhibitions Custom Post Types
Description: Custom Post Types for Western Exhibitions website.
Author: Frederick Wells
Author URI: http://www.pandabrand.net
*/

add_action( 'init', 'western_exhibitions_cpt' );

function western_exhibitions_cpt() {
  register_post_type( 'exhibition', array(
    'labels' => array(
      'name' => 'Exhibitions',
      'singular_name' => 'Exhibition',
      'menu_name' => 'Exhibition',
      'name_admin_bar' => 'Exhibition',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Exhibition',
      'edit_item' => 'Edit Exhibition',
      'new_item' => 'New Exhibition',
      'view_item' => 'View Exhibition',
      'search_items' => 'Search Exhibition',
      'not_found' => 'No Exhibitions found',
      'not_found_in_trash' => 'No Exhibitions in the trash.',
      'all_items' => 'Exhibitions',
     ),
    'description' => 'Exhibition that will be presented at Western Exhibitions or elsewhere.',
    'public' => true,
    'menu_position' => 2,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'show_in_nav_menus' => true,
    'has_archive' => true
  ));

  register_post_type( 'artist', array(
    'labels' => array(
      'name' => 'Artists',
      'singular_name' => 'Artist',
      'menu_name' => 'Artist',
      'name_admin_bar' => 'Artist',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Artist',
      'edit_item' => 'Edit Artist',
      'new_item' => 'New Artist',
      'view_item' => 'View Artist',
      'search_items' => 'Search Artists',
      'not_found' => 'No Artists found',
      'not_found_in_trash' => 'No Artists in the trash.',
      'all_items' => 'Artists',
     ),
    'description' => 'Artists that will be showing work at Western Exhibitions.',
    'public' => true,
    'menu_position' => 2,
    'show_in_nav_menus' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive' => true
  ));

  register_post_type( 'art_fair', array(
    'labels' => array(
      'name' => 'Art Fairs',
      'singular_name' => 'Art Fair',
      'menu_name' => 'Art Fair',
      'name_admin_bar' => 'Art Fair',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Art Fair',
      'edit_item' => 'Edit Art Fair',
      'new_item' => 'New Art Fair',
      'view_item' => 'View Art Fair',
      'search_items' => 'Search Art Fairs',
      'not_found' => 'No Art Fairs found',
      'not_found_in_trash' => 'No Art Fairs in the trash.',
      'all_items' => 'Art Fairs',
     ),
    'description' => 'Art Fairs that Western Exhibitions will be participating in.',
    'public' => true,
    'menu_position' => 10,
    'show_in_nav_menus' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive' => true
  ));

  register_post_type( 'press', array(
    'labels' => array(
      'name' => 'Press',
      'singular_name' => 'Press',
      'menu_name' => 'Press',
      'name_admin_bar' => 'Press',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Press',
      'edit_item' => 'Edit Press',
      'new_item' => 'New Press',
      'view_item' => 'View Press',
      'search_items' => 'Search Press',
      'not_found' => 'No Press found',
      'not_found_in_trash' => 'No Press in the trash.',
      'all_items' => 'Press',
     ),
    'description' => 'Press for artists at Western Exhibitions or for Western Exhibitions.',
    'public' => true,
    'menu_position' => 2,
    'show_in_nav_menus' => true,
    'supports' => array( 'title', 'editor' ),
    'has_archive' => true
  ));

  register_post_type( 'in-depth', array(
    'labels' => array(
      'name' => 'In Depth Page',
      'singular_name' => 'In Depth Page',
      'menu_name' => 'In Depth Page',
      'name_admin_bar' => 'In Depth',
      'add_new' => 'Add New In Depth Page',
      'add_new_item' => 'Add New In Depth Page',
      'edit_item' => 'Edit In Depth Page',
      'new_item' => 'New In Depth Page',
      'view_item' => 'View In Depth Page',
      'search_items' => 'Search In Depth Pages',
      'not_found' => 'No In Depth Pages found',
      'not_found_in_trash' => 'No In Depth Pages in the trash.',
      'all_items' => 'In Depth Page',
     ),
    'description' => 'In Depth Pages for Western Exhibitions.',
    'public' => true,
    'menu_position' => 2,
    'show_in_nav_menus' => true,
    'supports' => array( 'title', 'thumbnail' ),
    'has_archive' => true
  ));
}

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('location', 'exhibition', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Locations', 'taxonomy general name' ),
      'singular_name' => _x( 'Location', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'parent_item' => __( 'Parent Location' ),
      'parent_item_colon' => __( 'Parent Location:' ),
      'edit_item' => __( 'Edit Location' ),
      'update_item' => __( 'Update Location' ),
      'add_new_item' => __( 'Add New Location' ),
      'new_item_name' => __( 'New Location Name' ),
      'menu_name' => __( 'Locations' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'locations', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));

  register_taxonomy('off-site-terms', 'exhibition', array(
    'hierarchical' => false,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Off-Site Terms', 'taxonomy general name' ),
      'singular_name' => _x( 'Off-Site Term', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Off-Site Terms' ),
      'all_items' => __( 'All Off-Site Terms' ),
      'parent_item' => __( 'Parent Off-Site Term' ),
      'parent_item_colon' => __( 'Parent Off-Site Term:' ),
      'edit_item' => __( 'Edit Off-Site Term' ),
      'update_item' => __( 'Update Off-Site Term' ),
      'add_new_item' => __( 'Add New Off-Site Term' ),
      'new_item_name' => __( 'New Off-Site Term Name' ),
      'menu_name' => __( 'Off-Site Terms' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'off_site_terms', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );
include_once( plugin_dir_path( __FILE__ ).'art-fair-fields.php' );
