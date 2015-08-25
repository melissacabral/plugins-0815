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
}

//no close php