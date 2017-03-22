<?php
// If this file is called directly, abort.
if ( ! defined ( 'WPINC' ) )
{
	die;
}
/**------------------------------------------------------------------------------
 * PLUGIN FUNCTIONS
 **------------------------------------------------------------------------------
 * Here where we store entire plugin function  , the recommended functions can be
 * helper functions , database functions  mostly functions that will be used in
 * your public , admin classes .
 **----------------------------------------------------------------------------**/


// Check  for your user permissions
// This function is used in activator.php file
if ( ! function_exists ( 'check_permissions' ) )
{

	function check_permissions ()
	{
		return current_user_can ( 'activate_plugins' );
	}


}