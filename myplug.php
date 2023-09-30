<?php
/*
Plugin Name: nftsetting
Description: This plugin is to do Setting for your NFT api details
Version: 1.0
Author: Payal
*/
$table_name = $wpdb->prefix . "nftsetting";

function addmyplug() {

	global $wpdb;

	$table_name = $wpdb->prefix . "nftsetting";

	$MSQL = "show tables like '$table_name'";
		
	if($wpdb->get_var($MSQL) != $table_name)
	{
	   $sql = "CREATE TABLE IF NOT EXISTS $table_name (
		  nid mediumint(9) NOT NULL AUTO_INCREMENT,
		  apikey text NULL,
		  nftprojectid text NULL,
		  countnft text  NULL,
		  lovelace text NULL,
		  addresstext text  NULL,
		  amounttext text NULL,
		  afteramounttxt text NULL,
		  PRIMARY KEY nid (nid)
		) ";
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		dbDelta($sql);
$wpdb->query("insert into $table_name(nid,apikey,nftprojectid,countnft,lovelace,addresstext,amounttext,afteramounttxt) values('','Your apikey','Your Porject ID',countnft,lovelace,'addresstext','amounttext','afteramounttxt')");

	}
}
	register_activation_hook(__FILE__,'addmyplug');
	/* Creating Menus */
	function member_Menu()
	{
		/* Adding menus */
				add_menu_page(__('nftsetting'),'nftsetting List', 8,'myplug/muyplg.php', 'nftsetting_add');
				//add_submenu_page('myplug/muyplg.php', 'Add advertisement', 'Add advertisement', 8, 'nftsetting_add', 'nftsetting_add');
	}
add_action('admin_menu', 'member_Menu');

//Adding JS/CSS in the Back End:
function nftplugcss() {
    wp_register_style('nftplugcss', plugins_url('style.css',__FILE__ ), false, '1.0.0', 'all');
    wp_enqueue_style('nftplugcss');
}
add_action( 'admin_init','nftplugcss');

//Adding JS/CSS in the Front End:
function enqueue_related_nftplugcss(){
        wp_enqueue_style('related-styles', plugins_url('style.css', __FILE__));
    }
add_action('wp_enqueue_scripts','enqueue_related_nftplugcss');


function nftsetting_add() {
	include "nftsetting_add.php";
}
function nftsetting_list($atts){
ob_start();
$atts = shortcode_atts( array(
		'btnname' => '#',
		), $atts, 'nftsetting' );
include "nftsetting_list.php";
return ob_get_clean();
}
add_shortcode('nftsetting', 'nftsetting_list');
?>