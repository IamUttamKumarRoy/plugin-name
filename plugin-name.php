<?php
/**
 * Plugin Name:       Your Cool Plugin Name
 * Plugin URI:        http://your-site.com/plugin-name/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Company
 * Author URI:        http://your-site.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

/**
 *  Define the Score Card Plugin Constants .
 */
require_once plugin_dir_path ( __FILE__ ) . 'config/plugin-name-constants.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in core/plugin-name-activator.php
 */
function YOUR_Plugin_Name_Activator ()
{

	if ( ! current_user_can ( 'activate_plugins' ) )
	{

		return;

	}

	require_once plugin_dir_path ( __FILE__ ) . 'core/plugin-name-activator.php';

	YOUR_Plugin_Name_Activator::activate ();

}

register_activation_hook ( __FILE__ , 'YOUR_Plugin_Name_Activator' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in core/plugin-name-deactivator.php
 */
function YOUR_Plugin_Name_Deactivator ()
{

	if ( ! current_user_can ( 'activate_plugins' ) )
	{

		return;

	}

	require_once plugin_dir_path ( __FILE__ ) . 'core/plugin-name-deactivator.php';

	YOUR_Plugin_Name_Deactivator::deactivate ();

}

register_deactivation_hook ( __FILE__ , 'YOUR_Plugin_Name_Deactivator' );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
function YOUR_Plugin_Name_Init ()
{

	// Define all plugin helpers ...
	require_once plugin_dir_path ( __FILE__ ) . 'core/plugin-name-helpers.php';

	// The core plugin ...
	require_once plugin_dir_path ( __FILE__ ) . 'core/plugin-name-core.php';

	// Define functions that interact with the database ...
	require_once plugin_dir_path ( __FILE__ ) . 'core/plugin-name-models.php';

	// Get Plugin settings ...
	$settings = require_once plugin_dir_path ( __FILE__ ) . 'config/plugin-name-settings.php';

	// Get Plugin models class ..
	$models = new YOUR_Plugin_Name_Models( $settings );

	// Initialize the plugin core class ...
	$YOUR_Plugin_Name_Core = new YOUR_Plugin_Name_Core( $settings , $models );

	// Run the plugin core class ...
	$YOUR_Plugin_Name_Core->run ();

}

/**
 * Begins execution of the plugin.
 */
YOUR_Plugin_Name_Init ();