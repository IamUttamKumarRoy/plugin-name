<?php


class YOUR_Plugin_Name_Admin
{

	/**
	 * @var: object / Store the plugin settings
	 */
	protected $settings;

	/**
	 * @var: string / Plugin name ..
	 */
	protected $plugin_name;

	/**
	 * @var: string / Plugin version ..
	 */
	protected $plugin_version;

	/**
	 * @var: array / Plugin post types list .
	 */
	protected $post_types;

	/**
	 * @var: array / Plugin metaboxes list .
	 */
	protected $metaboxes;
	/**
	 * @var: array / Plugin taxonomies list .
	 */
	protected $taxonomies;

	/**
	 * @var: class object / Store plugin database relation functions
	 */
	protected $models;

	/**
	 * @param $settings : object / Store the plugin settings
	 * @param $models   : class object / Store plugin database relation functions
	 */
	public function __construct ( $settings , $models )
	{

		// Store the plugin settings
		$this->settings = $settings;

		// The plugin name ...
		$this->plugin_name = $settings->plugin_name;

		// Registered post types .
		$this->post_types = $settings->post_types;

		// Registered metaboxes ...
		$this->metaboxes = $settings->metaboxes;

		// Registered taxonomies ...
		$this->taxonomies = $settings->taxonomies;

		// Plugin post types list .
		$this->plugin_version = $settings->plugin_version;

		// Store plugin database relation functions
		$this->models = $models;


		// Register All Plugin post types based on post type settings set in config/plugin-name-settings.php file ...
		add_action ( 'init' , array (
			$this ,
			'ACTION_register_post_types'
		) );


		// Register Attributes view metabox for Properties post type ...
		add_action ( 'add_meta_boxes' , array (
			$this ,
			'ACTION_attributes_meta_boxes'
		) );


	}


	/**
	 *  Register All Plugin post types based on post type settings set in config/plugin-name-settings.php file ...
	 */
	public function ACTION_register_post_types ()
	{

		foreach ( $this->post_types as $post_type => $post_type_args )
		{

			register_post_type ( $post_type , $post_type_args );

		}

		add_post_type_support( 'scorecard-questions', 'page-attributes' );

		foreach ( $this->taxonomies as $taxonomy => $taxonomy_args )
		{

			register_taxonomy ( $taxonomy , $taxonomy_args[ 'object_type' ] , $taxonomy_args[ 'args' ] );

		}

	}

	/**
	 * Register Attributes and Map metaboxes for Properties post type
	 */
	public function ACTION_attributes_meta_boxes ()
	{

		foreach ( $this->metaboxes as $metabox => $metabox_args )
		{

			add_meta_box (
				$metabox ,
				$metabox_args[ 'title' ] ,
				array (
					$this ,
					$metabox_args[ 'callback' ]
				) ,
				$metabox_args[ 'screen' ] ,
				$metabox_args[ 'context' ] ,
				$metabox_args[ 'priority' ] ,
				$metabox_args[ 'callback_args' ]
			);

		}

	}


	public function METABOX_CALLBACK_questions ()
	{
		// ...
	}


}