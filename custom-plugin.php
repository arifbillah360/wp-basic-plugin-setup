<?php
/**
 * Plugin Name:       EAA Shortcode
 * Plugin URI:        https://arifbillah.cyou/plugin
 * Description:       This is a custom plugin by Arif Billah.
 * Version:           1.0.2
 * Author:            Arif Billah
 * Author URI:        https://arifbillah.cyou
 * License:           GPL v2 or later
 */

//you can find the path. that means your plugin can understand which path are setuated now.
define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("PLUGINS_URL", plugins_url());


 function add_custom_menu(){
 	add_menu_page(  'eaashortcode',   //string
				 	'Eaa Shortcode',		// title
				 	'manage_options', //capability
				 	'eaa-shortcode-slug', //slug
				 	'eaa_plugin_func',   //function
				 	'dashicons-share-alt',  //icon
				 	80  //position
				    );
 	//wordpress dashboard submenu
 	add_submenu_page( 'eaa-shortcode-slug', 'Short Code', 'ShortCode 1', 'manage_options', 'eaa-shortcode-slug', 'eaa_plugin_func' );
 	add_submenu_page( 'eaa-shortcode-slug', 'Short Code', 'ShortCode 2', 'manage_options', 'eaa-shortcode-slug1', 'eaa_plugin_func2' );

}
add_action('admin_menu', 'add_custom_menu');

/*function Called
function eaa_plugin_func(){
	echo "Hello World";
}
*/
//function Called
function eaa_plugin_func(){
	include_once PLUGIN_DIR_PATH.'/views/sc1.php';
}
//2nd function called
function eaa_plugin_func2(){
	include_once PLUGIN_DIR_PATH.'/views/sc2.php';
}


//admin style assets link up
function eaa_plugin_assets(){
	wp_enqueue_style('style', PLUGINS_URL."/eaa-shortcode/assets/css/style.css", '' , '1.0');
	wp_enqueue_script('mainjs', PLUGINS_URL. "/eaa-shortcode/assets/js/main.js", '', '1.1' , true );
}
add_action('admin_enqueue_scripts', 'eaa_plugin_assets');




?>