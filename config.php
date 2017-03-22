<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}
/**------------------------------------------------------------------------------
 * PLUGIN CONFIG
 **------------------------------------------------------------------------------
 * Define the general plugin settings .
 *
 * @OBSERVATION : Change "$plugin_name_settings" variable into a more plugin
 *              appropriate name.
 **----------------------------------------------------------------------------**/

// Store your plugin header details.
global $plugin_name_settings;

$plugin_name_settings = get_file_data (
	$__ROOT_FILE__ , array (
		               'name'        => 'Plugin Name' ,
		               'version'     => 'Version' ,
		               'description' => 'Description' ,
		               'author'      => 'Author' ,
		               'author_uri'  => 'Author URI' ,
		               'license'     => 'License' ,
		               'license_uri' => 'License URI' ,
		               'text_domain' => 'Text Domain' ,
		               'domain_path' => 'Domain Path' ,
	               )
);
