<?php

/**
 * TODO:  Change PluginName into your real plugin name ....
 *
 * Class PluginName_Plugin_Admin
 */
class PluginName_Plugin_Admin
{

	/**
	 * Store Plugin settings
	 *
	 * @var
	 */
	private $plugin_general_settings;

	/**
	 * Define all public action ,filters and hooks here .
	 *
	 * @param $plugin_general_settings
	 */
	public function __construct ( $plugin_general_settings )
	{

		$this->load_dependencies ();
		$this->plugin_general_settings = $plugin_general_settings;


		add_action ( 'wp_enqueue_scripts' , array (
			&$this ,
			'enqueue_styles'
		) );
		add_action ( 'wp_enqueue_scripts' , array (
			&$this ,
			'enqueue_scripts'
		) );


	}

	/**
	 * TODO:  You can load here admin files (libs, helpers , etc ..) that are used only in admin class.
	 * Load General core the required dependencies for this plugin public only .
	 *
	 * Include the following files that make up the plugin:
	 */
	private function load_dependencies ()
	{


	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles ()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 */
		wp_enqueue_style ( $this->plugin_general_settings->plugin_name , plugin_dir_url ( __FILE__ ) . 'css/plugin-admin.css' , array () , $this->plugin_general_settings->plugin_version , 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts ()
	{
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 */
		wp_enqueue_script ( $this->plugin_general_settings->plugin_name , plugin_dir_url ( __FILE__ ) . 'js/plugin-admin.js' , array ( 'jquery' ) , $this->plugin_general_settings->plugin_version , FALSE );
	}
}