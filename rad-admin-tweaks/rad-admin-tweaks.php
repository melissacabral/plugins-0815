<?php 
/*
Plugin Name: Rad Admin Tweaks
Description:  Customize the admin panel and login screen
Author: Melissa Cabral
*/

//style the login and register forms
function rad_login_css(){
	//get the path to our stylesheet
	$pork = plugins_url('css/login-style.css', __FILE__);
	//put our stylesheet on the page
	wp_enqueue_style( 'login-style', $pork );
}
// this is the right hook for enqueueing style and js on the login form
add_action( 'login_enqueue_scripts', 'rad_login_css' );

//Change the href of the link on the login form
function rad_login_href(){
	return home_url();  //the home page of our site. you can make this any URL
}
add_filter( 'login_headerurl', 'rad_login_href' );

//change the tooltip on the login logo
function rad_login_title(){
	return 'Go back to '. get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'rad_login_title' );


//remove the WP logo and dropdown from the toolbar
// @link https://codex.wordpress.org/Toolbar 
function rad_remove_node( $wp_admin_bar ){
	$wp_admin_bar->remove_node( 'wp-logo' );

	//add our own node to the toolbar
	$wp_admin_bar->add_node( array(
		'id' 	=> 'contact-me',
		'title' => 'Contact Melissa',
		'href'	=> 'http://wordpress.melissacabral.com',
	) );
	
}
add_action( 'admin_bar_menu', 'rad_remove_node', 999 );

//Hide and add dashboard widgets 
function rad_dashboard(){
	//this will make "wordpress news" disappear for all users
						//ID of the box    //screen    //column
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	//remove the "activity" box
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

	//add our own custom dashboard box
	wp_add_dashboard_widget( 'dashboard_rad_help', 'Helpful Information', 
		'rad_widget_callback' );

}
add_action( 'wp_dashboard_setup', 'rad_dashboard' );

//callback function for the content of our custom dashboard box
function rad_widget_callback(){
	?>
	<h3><span class="dashicons dashicons-format-video"></span> Check out this youtubes</h3>
	<iframe width="350" height="197" src="https://www.youtube.com/embed/qO8GZNdQ54I" frameborder="0" allowfullscreen></iframe>
	<?php
}

function rad_admin_css(){
	//get the path to our stylesheet
	$pork = plugins_url('css/admin-style.css', __FILE__);
	//put our stylesheet on the page
	wp_enqueue_style( 'admin-style', $pork );
}
// this is the right hook for enqueueing style and js on the admin form
add_action( 'admin_enqueue_scripts', 'rad_admin_css' );