<?php


class YOUR_Plugin_Name_Public
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
	 * @param $settings           :  object / Store the plugin settings
	 * @param $models             : class object / Store plugin database relation functions
	 */
	public function __construct ( $settings , $models  )
	{

		// Store the plugin settings
		$this->settings = $settings;

		//  Store plugin database relation functions
		$this->settings = $models;

	}


}