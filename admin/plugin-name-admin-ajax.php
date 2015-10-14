<?php


class YOUR_Plugin_Name_Admin_Ajax
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
	 * @var: class object / Store plugin database relation functions
	 */
	protected $models;

	/**
	 * @param $settings           :  object / Store the plugin settings
	 * @param $models             : class object / Store plugin database relation functions
	 */
	public function __construct ( $settings , $models )
	{

		// Store the plugin settings
		$this->settings = $settings;

		// The plugin name ...
		$this->plugin_name = $settings->plugin_name;

		//  Plugin version .
		$this->post_types = $settings->post_types;

		//  Plugin post types list .
		$this->plugin_version = $settings->plugin_version;

		//  Store plugin database relation functions
		$this->models = $models;



	}

}