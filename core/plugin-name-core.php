<?php

class YOUR_Plugin_Name_Core
{

	/**
	 * @var: object / Store the plugin settings
	 */
	protected $settings;

	/**
	 * @var: class object / Store plugin database relation functions
	 */
	protected $models;

	/**
	 * @param $settings :  object / Store the plugin settings
	 * @param $models   : class object / Store plugin database relation functions
	 */
	public function __construct ( $settings , $models )
	{

		// Store the plugin settings
		$this->settings = $settings;

		//  Store plugin database relation functions
		$this->models = $models;

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
	 * Load General core the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 */
	private function load_dependencies ()
	{
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain ()
	{

		load_plugin_textdomain (
			$this->settings->plugin_name ,
			FALSE ,
			dirname ( dirname ( plugin_basename ( __FILE__ ) ) ) . '/languages/'
		);

	}


	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run ()
	{

		// The class responsible for defining all actions that occur in the Dashboard.
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'admin/plugin-name-admin.php';
		new YOUR_Plugin_Name_Admin( $this->settings , $this->models );

		// The class responsible for defining all actions that occur in the Dashboard ajax calls.
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'admin/plugin-name-admin-ajax.php';
		new YOUR_Plugin_Name_Admin_Ajax( $this->settings , $this->models );

		// The class responsible for defining all actions that occur in the Dashboard.
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'public/plugin-name-public.php';
		new YOUR_Plugin_Name_Public( $this->settings , $this->models );

		// The class responsible for defining all actions that occur in the Public ajax call.
		require_once plugin_dir_path ( dirname ( __FILE__ ) ) . 'public/plugin-name-public-ajax.php';
		new YOUR_Plugin_Name_Public_Ajax( $this->settings , $this->models );


	}

}