<?php
/**
 * Define the general plugin settings .
 *
 * Set the plugin name and the plugin version that can be used throughout the plugin.
 */


/**
 * TODO:  Change plugin-name into your real plugin name slug....
 * Set the plugin name .
 */
$settings[ 'plugin_name' ] = 'plugin-name';

/**
 * TODO:  Change pplugin_version into your real plugin version are you develop....
 * Set the plugin version .
 */
$settings[ 'plugin_version' ] = '1.0.0';

/**
 * Set templates that you want to load them from plugin to Pages..
 */
$settings[ 'templates' ] = array ();


// for fancy reason we will access array settings as objects ...
return (object) $settings;
