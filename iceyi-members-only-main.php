<?php
/*
	Plugin Name: iCeyi Members Only
	Plugin URI: http://qweelo.com/wordpress-plugins/
	Description: Provides shorcodes to protect content in posts and pages, simply place the protected content between these shortcodes [membersonly] protected content here [/membersonly] the user must be logged in to view.
	Version: 2.2.0
	Author: Qweelo
	Author URI: http://qweelo.com/
	License: GPLv2 or later
	Text Domain: qw-iceyi-mos
	Usage: Simple and easy to use, install and activate.

*/

/*------------------------------------------------------------------*/

/*  Copyright 2015 iCeyi Members Only (email : icelayer@yahoo.com)


	This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

/*----------------------------------------------------
				* ACCESS DENIED *
----------------------------------------------------*/
	$qwpluginpathe = 'iceyi-members-only-main.php';

	if (basename($_SERVER['SCRIPT_FILENAME']) == $qwpluginpathe)
		{
	die ("<title>QWEELO &#8212; Qweelo.com </title><div align='center'><h1>QWEELO</h1>SOMETHING WENT WRONG PLEASE CONTACT SUPPORT!!!</div>");
	}

/*----------------------------------------------------
				* LANG STUFF *
----------------------------------------------------*/	
	// plugin languages
		add_action( 'plugins_loaded', 'qwmos_textdomain' );

/**
 Load plugin textdomain.
 */
	function qwmos_textdomain() {
		load_plugin_textdomain( 'qw-iceyi-mos', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
	}
/*----------------------------------------------------
				* START THE PLUGIN *
----------------------------------------------------*/	
//.......CONSTANTS

		define('QMOS_HEADER', plugin_dir_path( __FILE__ ).'/admin-header.php');
		define('QMOS_PAGE', plugin_dir_path( __FILE__ ) .'/admin-page.php');		
		define('QMOS_FOOTER', plugin_dir_path( __FILE__ ) .'/admin-footer.php');
/*----------------------------------------------------
				* ADMIN MENU *
----------------------------------------------------*/	
	
	add_action('admin_menu', 'qw_qwmos_menu_page');
	function qw_qwmos_menu_page() {
		add_options_page('Members Only Shortcode', 'iCeyi Members ', 'manage_options', 'iceyi-mos-qw-options', 'admin_page_qwmos', '2.124');
	}	//fend
	
/*------------------------------------------------------------------
				* RENDER ADMIN PAGE FUNCTION   *
------------------------------------------------------------------*/	
	function admin_page_qwmos(){					
				include_once(QMOS_HEADER);
				include_once(QMOS_PAGE);			
				include_once(QMOS_FOOTER);
	}// fend	

//--------------------  [membersonly] protected [/membersonly] -----------------------------------*/

function membersonly_shortcode_iceyi( $atts, $content = null ) {

		ob_start();
		//...........................................................................................		
		if ( is_user_logged_in() ) {
		echo do_shortcode($content) ;
		}else{ echo 'Members Only Login Here'; wp_login_form( $args ); }/* // login check */;		
		//.............................................................................................
		$output_membersonly_obj = ob_get_contents(); 
		ob_end_clean();
		return $output_membersonly_obj;
	
	}// END SHORTCODE
	add_shortcode( 'membersonly', 'membersonly_shortcode_iceyi' );

//--------------------  [qw_members] protected [/qw_members] -----------------------------------*/

function members_qw( $atts, $content = null ) {

		ob_start();
		//...........................................................................................		
		if ( is_user_logged_in() ) {
		echo do_shortcode($content) ;
		}else{ echo 'Members Only Login Here'; wp_login_form( $args ); }/* // login check */;		
		//.............................................................................................
		$output_qw_members_obj = ob_get_contents(); 
		ob_end_clean();
		return $output_qw_members_obj;
	
	}// END SHORTCODE
	add_shortcode( 'qw_members', 'members_qw' );