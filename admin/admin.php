<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

/**------------------------------------------------------------------------------
 * ADMIN
 **------------------------------------------------------------------------------
 * All plugin  admin logic goes in this file.
 *
 * @OBSERVATION : Please change "PluginName_*" into more plugin
 *              appropriate name.
 *
 **----------------------------------------------------------------------------**/
if ( ! class_exists ( 'PluginName_Admin' ) )
{
	class PluginName_Admin
	{


		public function __construct ()
		{

			// Add Admin scripts ...
			/*		add_action (
						'admin_enqueue_scripts' , function ()
					{
						// Styles ...
						wp_enqueue_style ( "plugin-admin" , plugin_dir_url ( __FILE__ ) . 'assets/css/plugin-admin.css' , array () , '1.0.0' , 'all' );

						// Scripts ..
						wp_enqueue_script ( "plugin-admin-js" , plugin_dir_url ( __FILE__ ) . 'assets/js/plugin-admin.js' , array ( 'jquery' ) , '1.0.0' , FALSE );
					}
					);*/

		}
	}
}