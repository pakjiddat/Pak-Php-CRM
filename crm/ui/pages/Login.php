<?php

declare(strict_types=1);

namespace Crm\Ui\Pages;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the Login page class
 * It is used to generate the login page
 *
 * @category   Page
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class Login extends BasePage
{
    /**
     * It provides the html for the dashboard page body
     *
     * @param array $params the parameters for generating the body
     *
     * @return string $body_html the html for the body
     */
    protected function GetBody(?array $params = null) : string
    {
        /** If the user is already logged in then he is redirected to the dashboard page */
        if (Config::GetComponent("sessionhandling")->GetSessionConfig("is_logged_in")) {
            /** The user is redirected */
            $this->Redirect("/");
            /** Application execution ends */
            die();
        }

        /** The tag values for the login page body */
        $tag_values = array("app_name" => Config::$config["general"]["app_name"]);
        /** The html for the login page body is generated */
        $body_html  = Config::GetComponent("widgetmanager")->Generate("login", $tag_values);

        return $body_html;
    }
    /**
     * Used to authenticate the user submitted login credentials
     *
     * It checks if the credentials submitted by the user match the credentials in the application configuration file
     * If the credentials match, then the user is redirected to the given url
     * If the credentials do not match then the function returns false
     * {@internal context web}
     *
     * @return array $validation_result the result of validating the user credentials
     */
    public function Validate() : array
    {
        /** The application parameters are fetched */
        $parameters              = Config::$config["general"]["parameters"];
        /** The user name is base64 decoded */
        $parameters['user_name'] = base64_decode($parameters['user_name']);
        /** The password is base64 decoded */
        $parameters['password']  = base64_decode($parameters['password']);
        /** If the given credentials are not valid then an error message is displayed to the user */
        if (!$this->ValidateCredentials($parameters['user_name'], $parameters['password'])) {
            /** The result of validating the user credentials */
            $validation_result = array(
                "message" => "Please enter a valid user name and password",
                "is_valid" => "no"
            );
        }
        /** If the credentials were valid */
        else {
            /** The result of validating the user credentials */
            $validation_result = array(
                "message" => $redirect_url,
                "is_valid" => "yes"
            );
        }

        return $validation_result;
    }
    /**
     * Used to authenticate the user submitted login credentials
     *
     * It checks if the credentials submitted by the user match the credentials in the application configuration file
     * If the credentials match, then the user is redirected to the given url
     * If the credentials do not match then the function returns false
     *
     * @param string $user_name the user name
     * @param string $password the user password
     *
     * @return boolean $is_valid used to indicate if the given credentials are valid
     */
    private function ValidateCredentials(string $user_name, string $password) : bool
    {
        /** The dbinit object is fetched */
        $dbinit          = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database        = $dbinit->GetDbManagerClassObj("Database");
        /** The table name for website content */
        $table_name      = Config::$config['general']['mysql_table_names']['user'];

        /** The SQL query for fetching the website content */
        $sql             = "SELECT first_name, password FROM `" . $table_name . "` WHERE user_name=? LIMIT 0,1";
        /** The first row is fetched */
        $row             = $database->FirstRow($sql, null);
        /** If the password matches */
        $is_valid        = (isset($row['password']) && password_verify($password, $row['password'])) ? true : false;
        /** If the password is valid */
        if ($is_valid) {
            /** The session configuration is set */
            $this->SetSessionConfig("is_logged_in", 'yes', false);
            /** The session configuration is set */
            $this->SetSessionConfig("first_name", $row['first_name'], false);
        }

        return $is_valid;
    }
}
