<?php

			echo '<hr/><p><strong>';
			_e('Basic Shortcode Usage' , 'my-members-only');
			echo '</strong>';
			_e('to protect posts or pages' , 'my-members-only');

			echo '<ul>';
			echo '<ol><strong>[membersonly]</strong> protected content here <strong>[/membersonly]</strong></ol>';
			echo '</ul>';
			echo '<hr/>';
			echo '<p><strong>';
			_e('Shortcodes Options ' , 'my-members-only');
			echo '</strong>';
			_e('Use With Options' , 'my-members-only');

			echo '<ul>';
			echo '<li> <strong> display="Custom text" </strong> change the message for none logged in user (defualt: You Must be Logged in to view this content)</li>';
			echo '<li> <strong> linkto="/wp-admin/" </strong> Link to specific page, recommended usage would be to use /wp-admin/ without http://wwww this is very good practice incase if you are using SSL or custom sub domain, <strong> Note that this will also disable Auto redirect </strong>  (defualt: WordPress Login Page) </li>';
			echo '<li> <strong> linktext="Click Here" </strong> change the text for link (defualt: Register or Login Here)</li>';
			echo '</ul>';

			echo '<ul>';
			echo '<ol> Example </ol>';
			echo '<ol><strong>[membersonly display="Login To Download" linkto="/wp-admin/" linktext="Login Here"]</strong> protected content here <strong>[/membersonly]</strong></ol>';
			echo '</ul>';


			echo '<hr/>';
			echo '<ol><li style="list-style:decimal;">';
			_e('Create a ', 'my-members-only');
			echo '<a href="post-new.php" target="_blank">';
			_e('Post', 'my-members-only');
			echo '</a>';
			_e(' or ', 'my-members-only');
			echo '<a href="post-new.php" target="_blank">';
			_e('Page', 'my-members-only');
			echo '</a>';
			_e(' or protect existing content.', 'my-members-only');
			echo '</li>';
            echo '<li style="list-style:decimal;">';
			_e('Place the shortcodes around the content you wish to protect.', 'my-members-only');
			echo '</li>';
			echo '</ol>';

			echo '</p>';
