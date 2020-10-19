<?php

	/**
	 * Lets check if we are serving protected content
	 * if we are then check to make sure the user is logged in
	 * if the user is not logged in then let them know that they need to log in
	 * to continue, if this is not protected content then move on and show as usual
	 *
	 * @param string $content .
	 * @return string
	 */
	function protected_content( $content ) {
		global $post;
		if ( is_singular() && is_main_query() ) {
			if ( 'membersonly' === $post->post_type ) {
				if ( is_user_logged_in() ) {
					return $content;
				} else {
				members_only_message();
				}
			} else {
				return $content;
			}
		}
	}
	add_filter( 'the_content', 'protected_content', 99 );

	/**
	 * Members_only_message()
	 *
	 * @return void
	 */
	function members_only_message(){ ?>
		<div class="members-only">
		Sorry You Need to Login!
		<hr/>
		<button class="members-only-button">
		<a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" title="Members Area Login" rel="home">Members Area</a>
		</button>
		<button class="members-only-button">
		<a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" title="Log In" rel="home">Log In</a>
		</button>
		</div>
	<?php
	}
