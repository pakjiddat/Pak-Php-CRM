<?php

declare(strict_types=1);

namespace Crm\Ui\Pages;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the Dashboard page class
 * It is used to generate the dashboard page
 *
 * @category   Page
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class Dashboard extends BasePage
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
        /** The task box html */
        $task_box_html    = Config::GetComponent("taskbox")->Generate();
        /** The goal box html */
        $goal_box_html    = Config::GetComponent("goalbox")->Generate();
        /** The income box html */
        $income_box_html  = Config::GetComponent("incomebox")->Generate();        
        /** The billing box html */
        $billing_box_html = Config::GetComponent("billingbox")->Generate();
        /** The alert html */
        $alert_box_html   = Config::GetComponent("widgetmanager")->Generate("alert");
        /** The scroll top html */
        $scroll_top_html  = Config::GetComponent("widgetmanager")->Generate("scrolltop");
        /** The task table html */
        $task_table_html  = Config::GetComponent("widgetmanager")->Generate("tasks");
        /** The tag values for the dashboard page body */
        $tag_values    = array(
                             "task_box" => $task_box_html,
                             "goal_box" => $goal_box_html,
                             "income_box" => $income_box_html,
                             "billing_box" => $billing_box_html,
                             "tasks_table" => $task_table_html,
                             "goals_table" => "",
                             "billing_table" => "",
                             "income_table" => "",
                             "alert" => $alert_box_html,
                             "scroll" => $scroll_top_html
                         );
        /** The html for the home page body is generated */
    	$body_html  = Config::GetComponent("templateengine")->Generate("dashboard", $tag_values);
    	
    	return $body_html;
    }
    
    
}
