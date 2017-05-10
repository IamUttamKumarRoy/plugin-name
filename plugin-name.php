<?php
/**
 * Plugin Name:       The Plugin Name
 * Plugin URI:        http://your-site.com/plugin-name/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Your Company
 * Author URI:        http://your-site.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 *
 * @package         : Wordpress Starter Plugin
 * @package_version : 1.0.0
 * @package_author  : Webberty (Baghina Radu Adrian)
 */
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}

/**---------------------------------------------------------------------------------------------------------------------------------
 * PLUGIN ROOT FILE PATH
 **---------------------------------------------------------------------------------------------------------------------------------
 * This variable it should not be changed because this will give you a global
 * way to read your plugin root file path and there are files depending on it
 **----------------------------------------------------------------------------**/
$__ROOT_FILE__ = __FILE__;


/**---------------------------------------------------------------------------------------------------------------------------------
 * PLUGIN CONFIG
 **---------------------------------------------------------------------------------------------------------------------------------
 * This file should only store configuration variables / globals, to make your
 * life easier now it store plugin root file configuration like . "Plugin Name",
 * "Version" , "Description", "Author", "Author URI", "Licence", "Licence URI",
 * "Text Domain", "Domain Path"
 *
 * @OBSERVATION : Please change "$plugin_name_settings" into more plugin
 *              appropriate name.
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'config.php';


/**---------------------------------------------------------------------------------------------------------------------------------
 * PLUGIN FUNCTIONS
 **---------------------------------------------------------------------------------------------------------------------------------
 * Here where we store entire plugin function  , the recommended functions can be
 * helper functions , database functions  mostly functions that will be used in
 * your public , admin classes .
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'includes/functions.php';

/**---------------------------------------------------------------------------------------------------------------------------------
 * ACTIVATOR / DEACTIVATOR
 **---------------------------------------------------------------------------------------------------------------------------------
 * This is where we define Plugin Activation / Deactivation hooks.
 *
 * @OBSERVATION : if some of register_deactivation_hook() or
 *              register_activation_hook() not used please remove them .
 *
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'includes/activator.php';

/**---------------------------------------------------------------------------------------------------------------------------------
 * ADMIN / PUBLIC
 **---------------------------------------------------------------------------------------------------------------------------------
 * Load Admin / Public classes, those classes are the ones where almost all of
 * your plugin logic code must be try to keep  them minimalistic ,clean and nice
 * commented.
 **----------------------------------------------------------------------------**/
if ( is_admin() ) 
{
	require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'admin/admin.php';
}

require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'public/public.php';

/**---------------------------------------------------------------------------------------------------------------------------------
 * RUN PLUGIN
 **---------------------------------------------------------------------------------------------------------------------------------
 * We are going to initialize Admin / Public classes when plugin loaded hook triggered
 * which means  here is where
 * all our magic starts.
 *
 * @plugins_loaded :    This hook is called once any activated plugins have been loaded.
 *                      Is generally used for immediate filter setup, or plugin overrides.
 *                      The plugins_loaded action hook fires early, and precedes the
 *                      setup_theme, after_setup_theme, init and wp_loaded action hooks.
 *
 * @DOCUMENTATION  : https://codex.wordpress.org/Plugin_API/Action_Reference/plugins_loaded
 *
 * @OBSERVATION    : Use admin only for admin and if is not necessary this class
 *              remove it.
 *              Change "PluginName_*" into more plugin appropriate name.
 *
 *
 **--------------------------------------------------------------------------------------------------------------------------------**/
add_action (
	'plugins_loaded' , function ()
{
	/**
	 * Loads the plugin's translated strings.
	 *
	 * If the path is not given then it will be the root of the plugin directory.
	 * The .mo file should be named based on the domain followed by a dash, and then the locale exactly.
	 * For example, the locale for German is 'de_DE', and the locale for Danish is 'da_DK'.
	 * If your plugin's text domain is "my-plugin" the Danish .mo and.po files should be named "my-plugin-da_DK.mo" and "my-plugin-da_DK.po"
	 * Call this function in your plugin as early as the init action.
	 *
	 * If you call load_plugin_textdomain multiple times for the same domain, the translations will be merged.
	 * If both sets have the same string, the translation from the original value will be taken.
	 *
	 * @DOCUMENTATION : https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
	 * @get_file_data : Searches for metadata in the first 8kiB of a file, such as a plugin or theme. Each piece of metadata must be on its own line.
	 * Fields can not span multiple lines, the value will get cut at the end of the first line.
	 * If the file data is not within that first 8kiB, then the author should correct their plugin file and move the data headers to the top.
	 *
	 * @DOCUMENTATION : https://developer.wordpress.org/reference/functions/get_file_data/
	 */
	load_plugin_textdomain ( get_file_data ( __FILE__ , array ( 'text_domain' => 'Text Domain' ) )[ 'text_domain' ] , FALSE , dirname ( plugin_basename ( __FILE__ ) ) . '/languages/' );

	// Is Admin ...
	if ( is_admin () )
	{
		// Initialize Admin hooks
		new PluginName_Admin();
	}

	// Initialize Public hooks
	new PluginName_Public();
}
);

// HAPPY CODDING !!
