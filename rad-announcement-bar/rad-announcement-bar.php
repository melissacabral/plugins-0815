<?php 
/*
Plugin Name: Rad Announcement Bar
Description:  Adds a simple yet eye-catching banner at the top of your site
Author: Melissa Cabral
Author URI: http://melissacabral.com
Plugin URI: http://path-to-plugin-support-site
Version: 0.1
License: GPLv3
*/

//HTML output
function rad_bar_html(){
	?>
	<!-- Rad Announcement Bar By Melissa Cabral -->
	<div id="rad-announcement-bar">
		<span>
			Hooray, It's Wednesday! <a href="">Learn More!</a>
		</span>
	</div>
	<?php 
}
//footer is the best place to add HTML markup since it is in the <body> tag
add_action( 'wp_footer', 'rad_bar_html' );

//attach the styles
function rad_announcement_css(){
	//get the path to the stylesheet
	//						relative path 			//this file
	$path = plugins_url( 'rad-announcement-style.css', __FILE__ );
							//handle 			//filepath
	wp_register_style( 'rad-announcement-style', $path );
	//put it on the page
	wp_enqueue_style( 'rad-announcement-style' );
}
            //this is the moment WP is attaching ALL scripts and styles
add_action( 'wp_enqueue_scripts', 'rad_announcement_css' );

//no close PHP 