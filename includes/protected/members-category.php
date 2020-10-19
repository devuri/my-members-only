<?php

	// @codingStandardsIgnoreFile 

/**
 * Register Custom Category.
 *
 * @return void
 */
function members_category() {

	$labels = array(
		'name'                       => _x( 'Members Only Categories', 'Category General Name', 'my-members-only' ),
		'singular_name'              => _x( 'Category', 'Category Singular Name', 'my-members-only' ),
		'menu_name'                  => __( 'Category', 'my-members-only' ),
		'all_items'                  => __( 'All Categories', 'my-members-only' ),
		'parent_item'                => __( 'Parent Category', 'my-members-only' ),
		'parent_item_colon'          => __( 'Parent Category:', 'my-members-only' ),
		'new_item_name'              => __( 'New Category Name', 'my-members-only' ),
		'add_new_item'               => __( 'Add New Category', 'my-members-only' ),
		'edit_item'                  => __( 'Edit Category', 'my-members-only' ),
		'update_item'                => __( 'Update Category', 'my-members-only' ),
		'view_item'                  => __( 'View Category', 'my-members-only' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'my-members-only' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'my-members-only' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'my-members-only' ),
		'popular_items'              => __( 'Popular Categories', 'my-members-only' ),
		'search_items'               => __( 'Search Categories', 'my-members-only' ),
		'not_found'                  => __( 'Not Found', 'my-members-only' ),
		'no_terms'                   => __( 'No categories', 'my-members-only' ),
		'items_list'                 => __( 'Categories list', 'my-members-only' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'my-members-only' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'taxonomy', array( 'membersonly' ), $args );

}
add_action( 'init', 'members_category', 0 );
