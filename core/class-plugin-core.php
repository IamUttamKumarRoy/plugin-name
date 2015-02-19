<?php

/**
 * TODO:  Change PluginName into your real plugin name ....
 * Class PluginName_Plugin_Core
 */
class PluginName_Plugin_Core
{

	/**
	 * Set all plugin settings here .
	 * This will be accessible from admin and public class..
	 *
	 * @var array
	 */
	private $plugin_general_settings;

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

		// Your "heavy" initialization stuff here
		$this->load_dependencies ();


	}

	/**
	 * TODO:  You can load here core files (libs, helpers , etc ..) that are related with both admin adn public.
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
		$this->define_admin_hooks ();
		$this->define_public_hooks ();

	}

	/**
	 * TODO:  Change PluginName into your real plugin name ....
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 */
	private function define_admin_hooks ()
	{

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'admin/class-plugin-admin.php';

		return new  PluginName_Plugin_Admin( $this->plugin_general_settings );

	}

	/**
	 * TODO:  Change PluginName into your real plugin name ....
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

		return new  PluginName_Plugin_Public( $this->plugin_general_settings );

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