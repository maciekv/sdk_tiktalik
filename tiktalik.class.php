<?php
require_once 'sdk.class.php';

/**
 * Contains the functionality for auto-loading service classes.
 */
class TKLoader
{
	/*%******************************************************************************************%*/
	// AUTO-LOADER

	/**
	 * Automatically load classes that aren't included.
	 *
	 * @param string $class (Required) The classname to load.
	 * @return boolean Whether or not the file was successfully loaded.
	 */
	public static function autoloader($class)
	{
		$path = dirname(__FILE__) . DIRECTORY_SEPARATOR;

		// Tiktalik SDK classes
		if (strstr($class, 'Tiktalik'))
		{
			if (file_exists($require_this = $path . 'services' . DIRECTORY_SEPARATOR . strtolower($class) . '.class.php'))
			{
				require_once $require_this;
				return true;
			}

			return false;
		}
	}
}
spl_autoload_register(array('TKLoader', 'autoloader'));
