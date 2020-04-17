<style>
.sw-header {
	box-shadow: 0 5px 15px rgba(0,0,0,.08);
	/* box-shadow: 0 1px 3px rgba(0,0,0,0.2); */
	padding: 20px;
	background-color: #fff;
	position: relative;
	z-index: 10;
	margin-left: -20px;
	margin-bottom: 20px;
}
</style><header class="sw-header"></header><?php

				echo '<div class="wrap">';
				//echo '<span class="dashicons-admin-settings"></span> a';
				echo '<h2>';
				//plugin name
				_e('Members Only ' , 'my-members-only');
				//echo icde_info('version');
				echo '<a href="https://switchwebdev.com/wordpress-plugins/" class="add-new-h2" target="_blank">';
				_e('by SwitchWebdev.com' , 'my-members-only');
				echo '</a>';
				echo ' <a href="https://wordpress.org/support/plugin/iceyi-members-only/reviews/" class="button button-primary" target="_blank">';
				_e(' Leave a Review' , 'my-members-only');
				echo '</a>';
				echo '<a href="https://wordpress.org/support/plugin/iceyi-members-only/" class="add-new-h2" target="_blank">';
				_e('Get Support' , 'my-members-only');
				echo '</a>';
				echo '</h2>';
				echo '<p class="description">';
				//plugin name
				_e('My Members Only Provides shorcodes to protect content in posts and pages, simply place the protected content between these shortcodes [membersonly] protected content here [/membersonly] the user must be logged in to view.
', 'my-members-only');
				echo ' <hr/>';
				echo '<h3 class="title">';

				//plugin name
				_e('My Members Only Shortcode ', 'my-members-only');
				_e('Options ', 'my-members-only');
				echo '</h3>';
