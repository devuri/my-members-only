<?php 

			echo '<hr/><p><strong>';
			_e('Use These Shortcodes' , 'qw-iceyi-mos');
			echo '</strong>'; 
			_e('to protect posts or pages' , 'qw-iceyi-mos');
				
			echo '<ul>';
			echo '<ol><strong> [qw_members]</strong> protected content here <strong>[/qw_members] </strong></ol>';
			echo '<ol><strong>[membersonly]</strong> protected content here <strong>[/membersonly]</strong></ol>';
			echo '</ul>';
				
			echo '<ol><li style="list-style:decimal;">';
			_e('Create a ', 'qw-iceyi-mos'); 
			echo '<a href="post-new.php" target="_blank">';
			_e('Post', 'qw-iceyi-mos');
			echo '</a>'; 
			_e(' or ', 'qw-iceyi-mos'); 
			echo '<a href="post-new.php" target="_blank">';
			_e('Page', 'qw-iceyi-mos');
			echo '</a>'; 
			_e(' or protect existing content.', 'qw-iceyi-mos');
			echo '</li>';
            echo '<li style="list-style:decimal;">';
			_e('Place the shortcodes around the content you wish to protect.', 'qw-iceyi-mos');
			echo '</li>';
			echo '</ol>';

			_e('For Maximum Compatibility Use Shortcodes' , 'qw-iceyi-mos');
			echo ' <strong>[qw_members]</strong> ';
			_e('protected content here', 'qw-iceyi-mos'); 
			echo ' <strong>[/qw_members]</strong> '; 
			_e('the user must be logged in to view.', 'qw-iceyi-mos');
			echo '</p>';


					







