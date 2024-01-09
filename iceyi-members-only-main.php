<?php
/**
 * Plugin Name:       My Members Only
 * Plugin URI:        https://wpbrisko.com/wordpress-plugins/
 * Description:       Provides shorcodes to protect content in posts and pages, simply place the protected content between these shortcodes [membersonly] protected content here [/membersonly] the user must be logged in to view. After they log in they will be redirected back to view the content.
 * Version:           6.8.7
 * Requires at least: 5.3.0
 * Requires PHP:      7.4
 * Author:            wpbrisko.com
 * Author URI:        https://wpbrisko.com
 * Text Domain:       my-members-only
 * Domain Path:       /languages
 * Usage:             Simple and easy to use, install and activate.
 * Tags:              member, members, profile, role, roles, shortcode, user, access, authentication, block, community, content, login, membership, password, permissions, register, registration, restriction, security, members only,
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

  	// deny direct access.
    if ( ! defined( 'WPINC' ) ) {
    	die;
    }

	// plugin directory.
	define( 'SWMYMO_VERSION', '6.7.3' );

	// plugin directory.
	define( 'SWMYMO_DIR', plugin_dir_path( __FILE__ ) );

	// plugin url.
	define( 'SWMYMO_URL', plugins_url( '/', __FILE__ ) );

  	/**
	 * Autloader
	 *
	 * @since 6.0
	 */
	require_once SWMYMO_DIR . 'sw-autload.php';
	$smymoloader = new swd_Autload();

	/**
	 *  Languages
	 *
	 * @since 1.0
	 */
	function my_members_only_swtext() {
		load_plugin_textdomain( 'my-members-only', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	add_action( 'plugins_loaded', 'my_members_only_swtext' );

	/**
	 *  Settings Page
	 *
	 * @since 1.0
	 */
	function swmy_members_only() {
		add_submenu_page(
			'edit.php?post_type=membersonly',
			'My Members Only Shortcode',
			'Members Shortcode',
			'manage_options',
			'my-members-only-shortcode',
			'my_members_only_settings_page'
		);
	}
	add_action( 'admin_menu', 'swmy_members_only' );

	/**
	 * Admin Files
	 *
	 * @return void
	 */
	function my_members_only_settings_page() {
		require_once SWMYMO_DIR . '/includes/admin/head.php';
		require_once SWMYMO_DIR . '/includes/admin/pages/my-members-only-admin.php';
		require_once SWMYMO_DIR . '/includes/admin/footer.php';
	}

// ------- Add Donate Button in the Plugin Install screen ----------------------
	add_filter( 'plugin_row_meta', function ( $links, $file ) {
			if ( strpos( $file, plugin_basename( __FILE__ ) ) !== false ) {
					$swmym_addlinks = array(
						'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6D6W2KXB88NKE" target="_blank">Donate</a>',
					);
					$links = array_merge( $links, $swmym_addlinks );
			}
			return $links;
		}, 10, 2
	);

// ---------- Add Support Settings in the Plugin Install screen ----------------

	add_filter( 'plugin_action_links', function ( $actions, $plugin_file ) {
		static $smym_only_support;
		if ( ! isset( $smym_only_support ) )
				$smym_only_support = plugin_basename( __FILE__ );
					if ( $smym_only_support === $plugin_file ) {
							$support_link = array( 'support' => '<a style="color:green;" href="https://wordpress.org/support/plugin/iceyi-members-only" target="_blank" title="Get Support"> Support </a>' );
							$settings = array( 'settings' => '<a href="'.esc_url( admin_url( 'edit.php?post_type=membersonly&page=my-members-only-shortcode' ) ).'"  title="Update Settings"> ' . __( 'Settings', 'my-members-only' ) . '</a>' ); // @codingStandardsIgnoreLine
				$actions = array_merge( $settings, $actions );
				$actions = array_merge( $support_link, $actions );
				}
				return $actions;
		}, 10, 5
	);




	/**
	 *  Load the Shortcodes [membersonly]
	 *
	 * @since 1.0
	 */
	$smymoloader->autoload( 'includes/shortcode', 'membersonly' );

	// Shortcode [qw_members].
	$smymoloader->autoload( 'includes/shortcode', 'qw_members' );

	/**
	 * New Built In Protected Post Type
	 *
	 * Added in Version 6.5
	 *
	 * Activate the new Feature "Members Only Content"
	 * What is Members Only Content, Members Only content allows you to create
	 * Special content that only your members can see, use the members only category
	 * to setup who can view content
	 * use special categories for special acccess levels
	 * by defualt all post in the members only content area is protected
	 *
	 * by defualt only if a user is logged in they will be able to acccess
	 * the defualt access level is subscriber for all content in the
	 * "members only content" section
	 *
	 * @since 6.2
	 */
	$smymoloader->autoload( 'includes/protected', 'membersonly' );
	$smymoloader->autoload( 'includes/protected', 'protected-filter' );
	$smymoloader->autoload( 'includes/protected', 'members-category' );
