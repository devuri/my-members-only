<?php
/**
 * Plugin Name: My Members Only
 * Plugin URI:  https://switchwebdev.com/wordpress-plugins/
 * Description: Provides shorcodes to protect content in posts and pages, simply place the protected content between these shortcodes [membersonly] protected content here [/membersonly] the user must be logged in to view. After they log in they will be redirected back to view the content.
 * Author:      SwitchWebdev.com
 * Author URI:  https://switchwebdev.com
 * Version:     6.5.3
 * License:     GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: my-members-only
 * Domain Path: languages
 * Usage:				Simple and easy to use, install and activate.
 * Tags:				member, members, profile, role, roles, shortcode, user, access, authentication, block, community, content, login, membership, password, permissions, register, registration, restriction, security, sirwil, icelayer, members only,
 *
 * Requires PHP: 5.4+
 * Tested up to PHP: 7.0
 *
 * Copyright 2018 - 2020 Uriel Wilson, support@switchwebdev.com
 * License: GNU General Public License
 * GPLv2 Full license details in license.txt
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 * ----------------------------------------------------------------------------
 * @category  	Plugin
 * @copyright 	Copyright © Uriel Wilson.
 * @package   	MyMembersOnly
 * @author    	Uriel Wilson
 * @link      	https://switchwebdev.com
 *  ----------------------------------------------------------------------------
 */

  # deny direct access
    if ( ! defined( 'WPINC' ) ) {
      die;
    }
	  # plugin directory
		  define("SWMYMO_VERSION", '6.5.3');
	  # plugin directory
	    define("SWMYMO_DIR", plugin_dir_path(__FILE__));
	  # plugin url
	    define("SWMYMO_URL", plugins_url( "/",__FILE__ ));
	#  -----------------------------------------------------------------------------

  /**
	 * Autloader
	 *
	 * @since 6.0
	 */
  include_once SWMYMO_DIR . 'sw-autload.php';
  $smymoloader = new swd_Autload();

	/**
	 *  languages
	 *
	 * @since 1.0
	 */
	add_action( 'plugins_loaded', 'my_members_only_swtext' );
	function my_members_only_swtext() {
		load_plugin_textdomain( 'my-members-only', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

/**
 *  Settings Page
 *
 * @since 1.0
 */
	add_action('admin_menu', 'swmy_members_only');
	function swmy_members_only() {
		add_submenu_page(
			'options-general.php',
			'My Members Only Shortcode',
			'Members Only',
			'manage_options',
			'my-members-only-settings',
			'my_members_only_settings_page' );
	}

# --------------- Admin MAIN Page ------------------------
		function my_members_only_settings_page(){
				// header
				require_once(SWMYMO_DIR. "/includes/admin/head.php");
				// page
				require_once(SWMYMO_DIR."/includes/admin/pages/my-members-only-admin.php");
				// footer
				require_once(SWMYMO_DIR. "/includes/admin/footer.php");
		}

# ------- Add Donate Button in the Plugin Install screen -----------------------
#
	add_filter( 'plugin_row_meta', 'swmymo_row_meta', 10, 2 );
	function swmymo_row_meta( $links, $file ) {
		if ( strpos( $file, plugin_basename( __FILE__ )  ) !== false ) {
				$swmym_addlinks = array(
				'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6D6W2KXB88NKE" target="_blank">Donate</a>',
        // 'docs' => '<a href="doc_url" target="_blank">Documentation</a>',
        // 'rate' => '<a href="https://wordpress.org/support/plugin/iceyi-members-only/reviews/?filter=5" target="_blank"><span class="dashicons dashicons-star-filled"></span> Rate</a>'
				);
				$links = array_merge( $links, $swmym_addlinks );
			}
			return $links;
		}


# ----------	Add Support Settings in the Plugin Install screen --------------

	add_filter( 'plugin_action_links', 'smym_support_link', 10, 5 );
	function smym_support_link( $actions, $plugin_file ) {
		static $smym_only_support;
		if (!isset($smym_only_support))
				$smym_only_support = plugin_basename(__FILE__);
					if ($smym_only_support == $plugin_file) {
							$support_link = array('support' => '<a style="color:green;" href="https://wordpress.org/support/plugin/iceyi-members-only" target="_blank" title="Get Support"> Support </a>');
							$settings = array('settings' => '<a href="options-general.php?page=my-members-only-settings"  title="Update Settings"> ' . __('Settings', 'my-members-only') . ' </a>');
				$actions = array_merge($settings, $actions);
				$actions = array_merge($support_link, $actions);
				}
				return $actions;
		}
/**
 *  Load the Shortcodes
 *
 * @since 1.0
 */
# [membersonly]
  $smymoloader->autoload('includes/shortcode','membersonly');

# [qw_members]
  $smymoloader->autoload('includes/shortcode','qw_members');

/**
 *  New Built In Protected Post Type
 *
 * @since 6.2
 */
$smymoloader->autoload('includes/protected','membersonly');
