<?php


class YOUR_Plugin_Name_Activator
{


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 */
	public static function activate ()
	{

		// ATTENTION: This is *only* done during plugin activation hook in this example!
		// You should *NEVER EVER* do this on every page load!!
		flush_rewrite_rules ();

	}


}

