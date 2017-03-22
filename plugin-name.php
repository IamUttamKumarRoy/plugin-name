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

/**------------------------------------------------------------------------------
 * PLUGIN ROOT FILE PATH
 **------------------------------------------------------------------------------
 * This variable it should not be changed because this will give you a global
 * way to read your plugin root file path and there are files depending on it
 **----------------------------------------------------------------------------**/
$__ROOT_FILE__ = __FILE__;


/**------------------------------------------------------------------------------
 * PLUGIN CONFIG
 **------------------------------------------------------------------------------
 * This file should only store configuration variables / globals, to make your
 * life easier now it store plugin root file configuration like . "Plugin Name",
 * "Version" , "Description", "Author", "Author URI", "Licence", "Licence URI",
 * "Text Domain", "Domain Path"
 *
 * @OBSERVATION : Please change "$plugin_name_settings" into more plugin
 *              appropriate name.
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'config.php';


/**------------------------------------------------------------------------------
 * PLUGIN FUNCTIONS
 **------------------------------------------------------------------------------
 * Here where we store entire plugin function  , the recommended functions can be
 * helper functions , database functions  mostly functions that will be used in
 * your public , admin classes .
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'includes/functions.php';

/**------------------------------------------------------------------------------
 * ACTIVATOR / DEACTIVATOR
 **------------------------------------------------------------------------------
 * This is where we define Plugin Activation / Deactivation hooks.
 *
 * @OBSERVATION : if some of register_deactivation_hook() or
 *              register_activation_hook() not used please remove them .
 *
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'includes/activator.php';

/**------------------------------------------------------------------------------
 * ADMIN / PUBLIC
 **------------------------------------------------------------------------------
 * Load Admin / Public classes, those classes are the ones where almost all of
 * your plugin logic code must be try to keep  them minimalistic ,clean and nice
 * commented.
 **----------------------------------------------------------------------------**/
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path ( $__ROOT_FILE__ ) . 'public/public.php';


/**------------------------------------------------------------------------------
 * RUN PLUGIN
 **------------------------------------------------------------------------------
 * We are going to initialize Admin / Public classes which means  here is where
 * all our magic starts.
 *
 * @OBSERVATION : Use admin only for admin and if is not necessary this class
 *              remove it.
 *              Change "PluginName_*" into more plugin appropriate name.
 *
 *
 **----------------------------------------------------------------------------**/
if ( is_admin () )
{
	new PluginName_Admin();
}
new PluginName_Public();


// HAPPY CODDING !!