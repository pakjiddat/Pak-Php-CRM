<?php

declare(strict_types=1);

namespace Crm\Config;

/**
 * This class provides path application configuration
 *
 * @category   Config
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
final class Path
{
    /**
     * It returns an array containing path configuration data
     *
     * @param array $parameters the application parameters
     *
     * @return array $config the custom configuration
     */
    public function GetConfig(array $parameters) : array
    {
        /** The required application configuration */
        $config                       = array();

        /** The application folder name */
        $config['app_folder']         = "crm";
        /** The path to the pear folder */
        $config['pear_folder_path']   = "/usr/share/php";
        /** The files to include for all application requests */
        $config['include_files']      = array("pear" => array("Mail/mime.php", "Mail.php"));

        return $config;
    }
}
