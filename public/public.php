<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

/**------------------------------------------------------------------------------
 * PUBLIC
 **------------------------------------------------------------------------------
 * All plugin  public logic goes in this file.
 *
 * @OBSERVATION : Please change "PluginName_*" into more plugin
 *              appropriate name.
 *
 **----------------------------------------------------------------------------**/
class PluginName_Public
{

	public function __construct ()
	{

		// Add Public scripts ...
		/*		add_action (
					'wp_enqueue_scripts' , function ()
				{
					// Styles ...
					wp_enqueue_style ( "plugin-public" , plugin_dir_url ( __FILE__ ) . 'assets/css/plugin-public.css' , array () , '1.0.0' , 'all' );

					// Scripts ..
					wp_enqueue_script ( "plugin-public-js" , plugin_dir_url ( __FILE__ ) . 'assets/js/plugin-public.js' , array ( 'jquery' ) , '1.0.0' , FALSE );
				}
				);*/

	}

}