<?php


class  YOUR_Plugin_Name_Models
{


	/**
	 * @var: object / Store the plugin settings
	 */
	protected $settings;

	/**
	 * @param $settings :  object / Store the plugin settings
	 */
	public function __construct ( $settings )
	{

		// Store the plugin settings
		$this->settings = $settings;

	}


}