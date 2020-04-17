<?php

/*
*--------------------------------------------------------------------------------
*				[qw_members] protected [/qw_members]
*				[qw_members display="Login To Download" linkto="/wp-admin/" linktext="Login Here" ] protected content here [/qw_members]
*/

	function qw_members_shortcode( $atts, $content = null ) {

		// set some default values
		$display_message = 'You Must be Logged in to view this content';
		$link = wp_login_url( get_permalink() );
		$linktext = 'Register or Login Here';

		// Attributes
		$atts = shortcode_atts(
			array(
				'display' => $display_message,
				'linkto' => $link,
				'linktext' => $linktext,
			),
			$atts
		);

		ob_start();
		//...........................................................................................
		if ( is_user_logged_in() ) {

			echo do_shortcode($content) ;

		} else {

						echo $atts['display'].', <a href=" '. $atts['linkto'] . ' " title="'. $atts['linktext'] . '"> '. $atts['linktext'] . '</a>';
		}/* // login check */;

		//.............................................................................................
		$output_qw_members_obj = ob_get_contents();

		ob_end_clean();
		return $output_qw_members_obj;

	}


	add_shortcode( 'qw_members', 'qw_members_shortcode' );
