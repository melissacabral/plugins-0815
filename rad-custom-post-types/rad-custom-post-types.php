<?php 
/*
Plugin Name: Rad Custom Post Types
Author: Melissa Cabral
Description: Adds the ability to have "products" 
Version: 0.1
License: GPLv3
*/

//create the post type 'product'
add_action( 'init', 'rad_cpt' );
function rad_cpt(){
	register_post_type( 'product', array(
		//display these products on the user-side
		'public' 		=> true,
		//make an archive page for all products
		'has_archive' 	=> true,
		'menu_icon'		=> 'dashicons-cart',
		'menu_position'	=> 5,
		//turn on meta boxes in admin panel
		'supports'		=> array('title', 'editor', 'thumbnail', 'custom-fields', 
								'excerpt'),
		//user-friendly admin labels
		'labels'		=> array(
				'name' 			=> 'Products', 	//plural
				'singular_name' => 'Product', 	//singular
				'add_new_item'	=> 'Add New Product',
				'not_found'		=> 'No Products Found',
		),
	) );

	//add "brands" to organize products by
	register_taxonomy( 'brand', 'product', array(
		'hierarchical'		=>	true,  //parent/child, like categories
		'show_admin_column'	=> true,
		'labels' 			=>  array(
			'name'				=>	'Brands',
			'singular_name'		=> 	'Brand',
			'add_new_item'		=>	'Add New Brand',
			'search_items'		=> 	'Search Brands',
			'not_found'			=>	'No Brands Found',
		),
	) );
	//add "features" to organize products by
	register_taxonomy( 'feature', 'product', array(
		'hierarchical'		=>	false, //flat, like tags
		'show_admin_column'	=> true,
		'labels' 			=>  array(
			'name'				=>	'Features',
			'singular_name'		=> 	'Feature',
			'add_new_item'		=>	'Add New Feature',
			'search_items'		=> 	'Search Features',
			'not_found'			=>	'No Features Found',
		),
	) );
}

//no close php