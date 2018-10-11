<?php
/**
 * @package GWA Document
 */
/*
Plugin Name: GWA Document
Plugin URI:
Description: Add custom post type for the GWA website
Version: 1.0.1
Author: MK
Author URI: https://mortensonkim.com
License: GPLv2 or later
Text Domain: gwadocs
Notes: See README.md
*/


/**
 * Documents - Custom Post Type
 */
function documents_cpt() {
	$labels = array(
		'name'                => _x( 'Documents', 'Post Type General Name' ),
		'singular_name'       => _x( 'Document', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Documents' ),
		'parent_item_colon'   => __( 'Parent Document' ),
		'all_items'           => __( 'All documents' ),
		'view_item'           => __( 'View Document' ),
		'add_new_item'        => __( 'Add New Document' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Document' ),
		'update_item'         => __( 'Update Document' ),
		'search_items'        => __( 'Search Document' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

	$args = array(
		'label'               => __( 'Document' ),
		'description'         => __( 'Document news and reviews' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions', ),
		'taxonomies'          => array( 'document','category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_icon'           => 'dashicons-clipboard',
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => array('slug' => 'documents', 'with_front' => false),
		'capability_type'     => 'page',
	);

	register_post_type( 'documents', $args );
}

add_action( 'init', 'documents_cpt', 0 );

/**
 * Add custom taxonomies to Documents CPT
 */
function add_custom_taxonomies() {
  register_taxonomy('sub-headlines', 'documents', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Sub Headlines', 'taxonomy general name' ),
      'singular_name' => _x( 'Sub Headline', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Sub Headlines' ),
      'all_items' => __( 'All Sub Headlines' ),
      'parent_item' => __( 'Parent Sub Headline' ),
      'parent_item_colon' => __( 'Parent Sub Headline:' ),
      'edit_item' => __( 'Edit Sub Headline' ),
      'update_item' => __( 'Update Sub Headline' ),
      'add_new_item' => __( 'Add New Sub Headline' ),
      'new_item_name' => __( 'New Sub Headline' ),
      'menu_name' => __( 'Sub Headlines' ),
    ),

		'rewrite' => array(
      'slug' => 'sub-headlines',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}

add_action( 'init', 'add_custom_taxonomies', 0 );
