<?php

declare(strict_types=1);

namespace Crm\Config;

/**
 * This class provides test application configuration
 *
 * @category   Config
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
final class Test
{
    /**
     * Used to return the configuration
     *
     * It returns an array containing testing configuration data
     *
     * @param array $parameters the application parameters
     *
     * @return array $config the custom configuration
     */
    public function GetConfig(array $parameters) : array
    {
      	/** The required application configuration */
    	$config                               = array();
    	/** The test mode is set */
    	$config['test_mode']                  = (php_sapi_name() == "cli") ? true : false;
    	/** The test type is set */
       	$config['test_type']                  = "ui";
       	/** Indicates if the ui test data should be saved */
       	$config['save_ui_test_data']          = false;       	
    	
        return $config;
    }
}
