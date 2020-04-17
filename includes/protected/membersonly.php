<?php
/**
 * https://developer.wordpress.org/reference/functions/register_post_type/
 */
if ( ! function_exists('sw_membersonlypost') ) {

// Register Post Type
function sw_membersonlypost() {

	$labels = array(
		'name'                  => _x( 'Members Only', 'Post Type General Name', 'my-members-only' ),
		'singular_name'         => _x( 'Member Only Post', 'Post Type Singular Name', 'my-members-only' ),
		'menu_name'             => __( 'Members Only', 'my-members-only' ),
		'name_admin_bar'        => __( 'Member Only', 'my-members-only' ),
		'archives'              => __( 'Member Only Archives', 'my-members-only' ),
		'attributes'            => __( 'Member Only Attributes', 'my-members-only' ),
		'parent_item_colon'     => __( 'Parent:', 'my-members-only' ),
		'all_items'             => __( 'Members Only Posts', 'my-members-only' ),
		'add_new_item'          => __( 'New Member Only Content', 'my-members-only' ),
		'add_new'               => __( 'Add New Post', 'my-members-only' ),
		'new_item'              => __( 'New Post', 'my-members-only' ),
		'edit_item'             => __( 'Edit Post', 'my-members-only' ),
		'update_item'           => __( 'Update Post', 'my-members-only' ),
		'view_item'             => __( 'View Post', 'my-members-only' ),
		'view_items'            => __( 'View Post', 'my-members-only' ),
		'search_items'          => __( 'Search Members Only Posts', 'my-members-only' ),
		'not_found'             => __( 'Member Only Post Not found', 'my-members-only' ),
		'not_found_in_trash'    => __( 'Member Only Post Not found in Trash', 'my-members-only' ),
		'featured_image'        => __( 'Post Cover Image', 'my-members-only' ),
		'set_featured_image'    => __( 'Set post featured image', 'my-members-only' ),
		'remove_featured_image' => __( 'Remove post image', 'my-members-only' ),
		'use_featured_image'    => __( 'Use as featured post image', 'my-members-only' ),
		'insert_into_item'      => __( 'Insert into Member Only Post', 'my-members-only' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Member Only Post', 'my-members-only' ),
		'items_list'            => __( 'Members Only Post list', 'my-members-only' ),
		'items_list_navigation' => __( 'Members Only Post list navigation', 'my-members-only' ),
		'filter_items_list'     => __( 'Filter Members Only Post list', 'my-members-only' ),
	);
	$args = array(
		'label'                 => __( 'Member Only', 'my-members-only' ),
		'description'           => __( 'Member Only Description', 'my-members-only' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'            => array( 'member_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-lock',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'smembersonly', $args );
  }
	add_action( 'init', 'sw_membersonlypost', 0 );
}
