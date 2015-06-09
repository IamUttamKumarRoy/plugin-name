<?php

/**
 * Class WbbTicketSystem_Plugin_Core
 */
class WbbTicketSystem_Plugin_Core
{

	/**
	 * Set all plugin settings here .
	 * This will be accessible from admin and public class..
	 *
	 * @var array
	 */
	private $plugin_general_settings;

	private $templates = array ();

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @param $plugin_general_settings
	 */
	public function __construct ( $plugin_general_settings )
	{
		$this->plugin_general_settings = $plugin_general_settings;
		$this->templates               = $plugin_general_settings->templates;

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * set the domain and to register the hook
		 * with WordPress.
		 */
		add_action ( 'plugins_loaded' , array (
			$this ,
			'load_plugin_textdomain'
		) );

		// Is there any custom page template set that must be loaded from plugin ....
		if ( isset( $this->plugin_general_settings->templates ) && ! empty( $this->plugin_general_settings->templates ) )
		{

			add_action ( 'init' , array (
				$this ,
				'plugin_templater'
			) );

		}
		
		// Your "heavy" initialization stuff here
		$this->load_dependencies ();

	}

	/**
	 * Load General core the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 */
	private function load_dependencies ()
	{


	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run ()
	{

		// Register Admin and public classes  ...
		if ( is_admin () )
		{

			$this->define_admin_hooks ();
		}
		$this->define_public_hooks ();

	}

	/**
	 * TODO:  Change WbbTicketSystem into your real plugin name ....
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 */
	private function define_admin_hooks ()
	{

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'admin/class-plugin-admin.php';

		return new  WbbTicketSystem_Plugin_Admin( $this->plugin_general_settings );

	}

	/**
	 * TODO:  Change WbbTicketSystem into your real plugin name ....
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 */
	private function define_public_hooks ()
	{

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'public/class-plugin-public.php';

		return new  WbbTicketSystem_Plugin_Public( $this->plugin_general_settings );

	}


	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 *
	 */

	public function register_plugin_templates ( $atts )
	{

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5 ( get_theme_root () . '/' . get_stylesheet () );

		// Retrieve the cache list.
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme ()->get_page_templates ();
		if ( empty( $templates ) )
		{
			$templates = array ();
		}

		// New cache, therefore remove the old one
		wp_cache_delete ( $cache_key , 'themes' );

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge ( $templates , $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add ( $cache_key , $templates , 'themes' , 1800 );

		return $atts;

	}

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_plugin_template ( $template )
	{

		global $post;

		if ( ! isset( $post->ID ) )
		{
			return get_404_template ();
		}

		$file =  get_post_meta ( $post->ID , '_wp_page_template' , TRUE );

		// Just to be safe, we check if the file exist first
		if ( file_exists ( $file ) )
		{

			return $file;

		}

		if ( ! isset( $this->templates[ get_post_meta ( $post->ID , '_wp_page_template' , TRUE ) ] ) )
		{

			return $template;

		}

		return $template;

	}
	
	/**
	 * Load Page templates from plugin side ....
	 */
	public function plugin_templater ()
	{

		// Add a filter to the attributes metabox to inject template into the cache.
		add_filter (
			'page_attributes_dropdown_pages_args' ,
			array (
				$this ,
				'register_plugin_templates'
			)
		);

		// Add a filter to the save post to inject out template into the page cache
		add_filter (
			'wp_insert_post_data' ,
			array (
				$this ,
				'register_plugin_templates'
			)
		);

		// Add a filter to the template include to determine if the page has our ,  template assigned and return it's path
		add_filter (
			'template_include' ,
			array (
				$this ,
				'view_plugin_template'
			) , 1
		);

	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain ()
	{

		load_plugin_textdomain (
			$this->plugin_general_settings->plugin_name ,
			FALSE ,
			dirname ( dirname ( plugin_basename ( __FILE__ ) ) ) . '/languages/'
		);


	}

}
