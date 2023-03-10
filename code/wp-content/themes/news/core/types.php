<?php
// Register Taxonomy Địa điểm
// Taxonomy Key: diadiem
function create_diadiem_tax() {

	$labels = array(
		'name'              => _x( 'Địa điểm', 'taxonomy general name', 'news' ),
		'singular_name'     => _x( 'Địa điểm', 'taxonomy singular name', 'news' ),
		'search_items'      => __( 'Search Địa điểm', 'news' ),
		'all_items'         => __( 'All Địa điểm', 'news' ),
		'parent_item'       => __( 'Parent Địa điểm', 'news' ),
		'parent_item_colon' => __( 'Parent Địa điểm:', 'news' ),
		'edit_item'         => __( 'Edit Địa điểm', 'news' ),
		'update_item'       => __( 'Update Địa điểm', 'news' ),
		'add_new_item'      => __( 'Thêm mới Địa điểm', 'news' ),
		'new_item_name'     => __( 'New Địa điểm Name', 'news' ),
		'menu_name'         => __( 'Địa điểm', 'news' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Địa điểm du lịch', 'news' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'dia-diem', 'post', $args );

}
add_action( 'init', 'create_diadiem_tax' );