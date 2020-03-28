<?php

declare(strict_types=1);

namespace Crm\Config;

/**
 * This class general application configuration
 *
 * @category   Config
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
final class General
{
    /**
     * It returns an array containing general configuration data
     *
     * @param array $parameters the application parameters
     *
     * @return array $config the custom configuration
     */
    public function GetConfig(array $parameters) : array
    {
      	/** The required application configuration */
    	$config                         = array();

        /** The path to the application folder */
        $config['app_name']             = "Pak Jiddat CRM";
        /** Indicates if application is in development mode */
        $config['dev_mode']             = true;
        /** Indicates that user access should be logged */
        $config['log_user_access']      = true;
        /** Indicates if application should use sessions */
        $config['enable_sessions']      = true;
        /** Indicates if application should use session authentication */
        $config['enable_session_auth']  = true;
        /** The type of session authentication is set to db */
        $config['session_auth']['type'] = "db";

   		/** The list of custom css files */
        $config['custom_css_files']     = array(
                                              array("url" => "{app_ui}/css/crm.css"),
                                              array("url" => "{fw_vendors}/w3-css/w3.css"),
                                              array("url" => "{fw_vendors}/@fontawesome/fontawesome-free/css/all.min.css")
                                          );
        /** The mysql table names */
        $config['mysql_table_names']    = array(
                                              "tasks" => "pakphp_tasks",
                                              "time_tracking" => "pakphp_time_tracking",
                                              "projects" => "pakphp_projects",
                                              "products_services" => "pakphp_products_services",
                                              "loans" => "pakphp_loans",
                                              "income" => "pakphp_income",
                                              "goals" => "pakphp_goals",
                                              "customers" => "pakphp_customers",
                                              "checklists" => "pakphp_checklists",
                                              "billing" => "pakphp_billing",
                                              "bank_statements" => "pakphp_bank_statements"
                                          );
        return $config;
    }
}
