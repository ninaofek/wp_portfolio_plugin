<?php
/*
* Plugin Name:Pretty Portpolio
* Plugin URI:
* Description: showing site portpolio
* Author: Ninja
* Version: 1.1
* Author URI:
* License: GPLv2+
* License URI:
* Text Domain: Pretty-Portpolio
* Domain Path:
*/

//Exit if accessed directly.
if( !defined('ABSPATH')) exit;

//register portfolio post type.
function pp_register_post_type() {

  $labels = array(
		'name'               => _x( 'Portpolio', 'post type general name', 'Pretty-Portpolio' ),
		'singular_name'      => _x( 'Portpolio item', 'post type singular name', 'Pretty-Portpolio' ),
		'menu_name'          => _x( 'Portpolio items', 'admin menu', 'Pretty-Portpolio' ),
		'name_admin_bar'     => _x( 'portpolio items', 'add new on toolbar', 'Pretty-Portpolio' ),
);
$args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'Portfolio' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
      'menu_icon'          => 'dashicons-images-alt2'
);
  register_post_type('pp_protfolio', $args);
}

add_action('init', 'pp_register_post_type');

//register item type taxonomy

function pp_create_taxonomy(){
  $labels = array(
  		'name'                       => _x( 'Item Types', 'taxonomy general name', 'Pretty-Portpolio' ),
  		'singular_name'              => _x( 'Item Type', 'taxonomy singular name', 'Pretty-Portpolio' ),
);

  $args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'Item Type' ),
	);

  register_taxonomy('pp_item_type', 'pp_protfolio', $arg);
}
add_action('init', 'pp_create_taxonomy');
