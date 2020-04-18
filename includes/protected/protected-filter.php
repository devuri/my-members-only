<?php


add_filter('the_content', 'protected_content', 99);
/**
 * lets check if we are serving protected content
 * if we are then check to make sure the user is logged in
 * if the user is not logged in then let them know that they need to log in
 * to continue, if this is not protected content then move on and show as usual
 * @param  [type] $content [description]
 * @return [type]          [description]
 */
function protected_content($content){
	global $post;
	if( is_singular() && is_main_query() ) {
		if ($post->post_type == 'membersonly') {
			if (is_user_logged_in()) {
				return $content;
			} else {
			members_only_message();
			}
		} else {
			return $content;
		}
	}
}

/**
 * members_only_message()
 * @return [type] [description]
 */
function members_only_message(){ ?>
	<div class="members-only">
	Sorry You Need to Login!
	<hr/>
	<button class="members-only-button">
	<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Members Area Login" rel="home">Members Area</a>
	</button>
	<button class="members-only-button">
	<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Log In" rel="home">Log In</a>
	</button>
	</div>
<?php }
