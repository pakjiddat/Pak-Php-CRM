<?php

declare(strict_types=1);

namespace Crm\Config;

/**
 * This class provides required objects application configuration
 *
 * @category   Config
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
final class RequiredObjects
{
    /**
     * It returns an array containing requiredobjects configuration data
     *
     * @param array $parameters the application parameters
     *
     * @return array $config the custom configuration
     */
    public function GetConfig(array $parameters) : array
    {
      	/** The required application configuration */
    	$config                                    = array();
      	/** The database parameters */
       	$dbparams                                  = array(
		                                                    "dsn" => "mysql:host=localhost;dbname=pakjiddat_crm_new;charset=utf8",
				                                            "user_name" => "nadir",
				                                            "password" => "kcW5eFSCbPXb#7LHvUGG8T8",
				                                            "use_cache" => false,
				                                            "debug" => 2,
				                                            "app_name" => "Pak Jiddat CRM"
	                                                    );
        /** The framework database parameters */
        $fwdbparams                                = $dbparams;													    	
	   	
	   	/** The framework database object parameters */
        $config['dbinit']['parameters']            = $dbparams;		
        /** The mysql database access class is specified with parameters for the pakjiddat_com database */
        $config['frameworkdbinit']['parameters']   = $fwdbparams;

	   	$config['application']['class_name']       = '\Crm\Ui\Pages\Login';
	   	$config['dashboard']['class_name']         = '\Crm\Ui\Pages\Dashboard';	   	
	   	$config['login']['class_name']             = '\Crm\Ui\Pages\Login';
	   	$config['taskbox']['class_name']           = '\Crm\Ui\Parts\TaskBox';
	   	$config['goalbox']['class_name']           = '\Crm\Ui\Parts\GoalBox';
	   	$config['incomebox']['class_name']         = '\Crm\Ui\Parts\IncomeBox';
	   	$config['billingbox']['class_name']        = '\Crm\Ui\Parts\BillingBox';
	   	
	   	$config['timetracking']['class_name']      = '\Crm\Lib\TimeTracking';	   	
	   		   		   		   	        
        return $config;
    }
}
