<?php
/**
 * Plugin Name:       You Cool Plugin name
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
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
 * TODO:  Change PluginName into your real plugin name ....
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
register_activation_hook ( __FILE__ , function ()
{

	require_once plugin_dir_path ( __FILE__ ) . 'hooks/class-activator.php';
	PluginName_Plugin_Activator::activate ();

} );

/**
 * TODO:  Change PluginName into your real plugin name ....
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
register_deactivation_hook ( __FILE__ , function ()
{

	require_once plugin_dir_path ( __FILE__ ) . 'hooks/class-deactivator.php';
	PluginName_Plugin_Deactivator::deactivate ();

} );


/**
 * TODO:  Change PluginName into your real plugin name ....
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path ( __FILE__ ) . 'core/class-plugin-core.php';
$PluginName = new PluginName_plugin_core( require_once plugin_dir_path ( __FILE__ ) . 'config/plugin-general-settings.php' );

/**
 * Begins execution of the plugin.
 *
 */
$PluginName->run ();
