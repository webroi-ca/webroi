<?php 
// Here goes all post types

/*Custom post type of Carousel*/
function post_type_carousel(){
	$labels = array(
		'name' => 'Carousel',
		'singular_name' => 'Carousel',
		'add_new' => 'Add Item',
		'add_new_item'=>'Add Item',
		'all_items' => 'All Items',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Carousel',
		'not_found' => 'No item', 
		'not_found_in_trash' => 'No Item found in trash',
		'parent_item_colon' => 'Parent Item'
	);

	$arguments = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
        'query_var' => true,
        'menu_icon'=> 'dashicons-format-gallery',
		'rewrite' => array('slug' => 'carousel', 'with_front'=>false),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'exclude_from_search' => true,
		'taxonomies' => array('carousel'),
		'supports' => array('title','editor','thubnail','revision', 'thumbnail', 'custom-fields')

	);
	register_post_type('carousel',$arguments);
}
add_action('init', 'post_type_carousel');

/* Register taxonomies*/
add_action('init',function(){
	$labels = array(
		'name'              => 'Types',
		'singular_name'     => 'Type',
		'search_items'      => 'Search Types',
		'all_items'         => 'All Types',
		'parent_item'       => 'Parent Type',
		'parent_item_colon' => 'Parent Type:',
		'edit_item'         => 'Edit Type',
		'update_item'       => 'Update Type',
		'add_new_item'      => 'Add New Type',
		'new_item_name'     => 'New Type Name',
		'menu_name'         => 'Type'
		);
	$arg = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'type'),
	);
	register_taxonomy('type', array('carousel'), $arg);
});