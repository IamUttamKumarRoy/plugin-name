<?php
/**
 * Define the general plugin settings .
 *
 * Set the plugin name and the plugin version that can be used throughout the plugin.
 */


/*******************************************************************************************************************
 * Set the plugin name .
 *******************************************************************************************************************/
$settings[ 'plugin_name' ] = 'plugin-name';

/*******************************************************************************************************************
 * Set the plugin version .
 *******************************************************************************************************************/
$settings[ 'plugin_version' ] = '1.0.0';

/*******************************************************************************************************************
 * Register Countries Post Type
 *******************************************************************************************************************/
$settings[ 'post_types' ][ 'books' ] = array (


	'labels'             => array (
		'name'               => _x ( 'Books' , 'post type general name' , $settings[ 'plugin_name' ] ) ,
		'singular_name'      => _x ( 'Book' , 'post type singular name' , $settings[ 'plugin_name' ] ) ,
		'menu_name'          => _x ( 'Books' , 'admin menu' , $settings[ 'plugin_name' ] ) ,
		'name_admin_bar'     => _x ( 'Book' , 'add new on admin bar' , $settings[ 'plugin_name' ] ) ,
		'add_new'            => _x ( 'Add New' , 'Book' , $settings[ 'plugin_name' ] ) ,
		'add_new_item'       => __ ( 'Add New Book' , $settings[ 'plugin_name' ] ) ,
		'new_item'           => __ ( 'New Book' , $settings[ 'plugin_name' ] ) ,
		'edit_item'          => __ ( 'Edit Book' , $settings[ 'plugin_name' ] ) ,
		'view_item'          => __ ( 'View Book' , $settings[ 'plugin_name' ] ) ,
		'all_items'          => __ ( 'Books' , $settings[ 'plugin_name' ] ) ,
		'search_items'       => __ ( 'Search Books' , $settings[ 'plugin_name' ] ) ,
		'parent_item_colon'  => __ ( 'Parent Books:' , $settings[ 'plugin_name' ] ) ,
		'not_found'          => __ ( 'No Books found.' , $settings[ 'plugin_name' ] ) ,
		'not_found_in_trash' => __ ( 'No Books found in Trash.' , $settings[ 'plugin_name' ] )
	) ,
	'public'             => TRUE ,
	'publicly_queryable' => TRUE ,
	'show_ui'            => TRUE ,
	'query_var'          => TRUE ,
	'rewrite'            => array ( 'slug' => 'books' ) ,
	'capability_type'    => 'post' ,
	'has_archive'        => TRUE ,
	'hierarchical'       => FALSE ,
	'menu_position'      => NULL ,
	'supports'           => array (
		'title' ,
		'editor' ,
		'author' ,
		'excerpt' ,
	)


);

/*******************************************************************************************************************
 * Register Metaboxes
 * Documentation :  https://codex.wordpress.org/Function_Reference/add_meta_box
 *******************************************************************************************************************/
$settings[ 'metaboxes' ][ 'custom-metabox' ] = array (
	'title'         => __ ( 'Custom Metabox' , $settings[ 'plugin_name' ] ) ,
	'callback'      => 'METABOX_CALLBACK_questions' ,
	'screen'        => 'books' ,
	'context'       => 'advanced' ,
	'priority'      => 'default' ,
	'callback_args' => NULL
);


$settings[ 'taxonomies' ][ 'authors' ] = array (


	'object_type' => 'books' ,
	'args'        => array (

		'labels'            => array (
			'name'                       => _x ( 'Authors' , 'taxonomy general name' ) ,
			'singular_name'              => _x ( 'Author' , 'taxonomy singular name' ) ,
			'search_items'               => __ ( 'Search Authors' ) ,
			'popular_items'              => __ ( 'Popular Authors' ) ,
			'all_items'                  => __ ( 'All Authors' ) ,
			'parent_item'                => NULL ,
			'parent_item_colon'          => NULL ,
			'edit_item'                  => __ ( 'Edit Author' ) ,
			'update_item'                => __ ( 'Update Author' ) ,
			'add_new_item'               => __ ( 'Add New Author' ) ,
			'new_item_name'              => __ ( 'New Author Name' ) ,
			'separate_items_with_commas' => __ ( 'Separate authors with commas' ) ,
			'add_or_remove_items'        => __ ( 'Add or remove authors' ) ,
			'choose_from_most_used'      => __ ( 'Choose from the most used authors' ) ,
			'not_found'                  => __ ( 'No authors found.' ) ,
			'menu_name'                  => __ ( 'Authors' ) ,
		) ,

		'hierarchical'      => TRUE ,
		'show_ui'           => TRUE ,
		'show_admin_column' => TRUE ,
		'query_var'         => TRUE ,
		'rewrite'           => array ( 'slug' => 'book-authors' ) ,
	)
);


// for fancy reason we will access array settings as objects ...
return (object) $settings;