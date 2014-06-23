<?php
/*
Plugin Name: iCeyi Members Only Shortcode
Plugin URI: http://icelayer.qweelo.com
Description: Provides shorcodes to protect content in posts and pages, simply place the protected content between these shortcodes [membersonly] protected content here [/membersonly] the user must be logged in to view.
Author: IceLAYER
Version: 1.5.0
Author URI: http://icelayer.qweelo.com
*/

/*------------------------------------------------------------------*/

/*  Copyright 2014 iCeyi Members Only (email : icelayer@yahoo.com)


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

/*------------------------------------------------------------------*/



//direct file ACCESS DENIED

$iceymembersonly_pluginpathe = 'iceyi-members-only-main.php';
if (basename($_SERVER['SCRIPT_FILENAME']) == $iceymembersonly_pluginpathe)

{

    die ("SOMETHING WENT WRONG PLEASE CONTACT SUPPORT!!!");

}

/*=========================================START THE PLUGIN============================================*/



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