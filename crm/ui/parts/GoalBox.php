<?php

declare(strict_types=1);

namespace Crm\Ui\Parts;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the GoalBox component class
 * It is used to generate the goal box component
 *
 * @category   Parts
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class GoalBox
{
    /**
     * It provides the html for the goal box
     *
     * @return string $box_html the box html
     */
    public function Generate() : string
    {
        /** The number of pending goals is returned */
        $goal_count = $this->GetPendingGoalCount();
        /** The parameters used to generate the goal box */
        $params     = array(
                          "id" => "goal-box",
                          "color" => "blue",
                          "text" => "Goals",
                          "link" => "#goals",
                          "icon" => "fas fa-bullseye",
                          "value" => $goal_count
                      );
        
        /** The goal box html is generated */
        $box_html   = Config::GetComponent("templateengine")->Generate("box", $params);
        
        return $box_html;
    }
    
    /**
     * It returns the number of pending goals
     *
     * @return int $goal_count the number of goals that have status "In Progress"
     */
    private function GetPendingGoalCount() : int
    {
        /** The dbinit object is fetched */
        $dbinit          = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database        = $dbinit->GetDbManagerClassObj("Database");
		/** The table name */
        $table_name      = Config::$config['general']['mysql_table_names']['goals'];
        
        /** The SQL query for fetching the website content */
        $sql             = "SELECT count(*) as total FROM `" . $table_name . "` WHERE status=? AND type=?";
        /** The SQL query parameters */
        $params          = array('In Progress', 'Short List');
        /** The first row is fetched */
        $row             = $database->FirstRow($sql, $params);
        
        $goal_count      = (int) $row['total'];
        
        return $goal_count;
    }
}
