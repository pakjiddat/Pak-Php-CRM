<?php

declare(strict_types=1);

namespace Crm\Ui\Parts;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the TaskBox component class
 * It is used to generate the task box component
 *
 * @category   Parts
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class TaskBox
{
    /**
     * It provides the html for the task box
     *
     * @return string $box_html the box html
     */
    public function Generate() : string
    {
        /** The number of pending tasks is returned */
        $task_count = $this->GetPendingTaskCount();
        /** The parameters used to generate the task box */
        $params     = array(
                          "id" => "task-box",
                          "color" => "red",
                          "text" => "Pending Tasks",
                          "link" => "#tasks",
                          "icon" => "fas fa-tasks",
                          "value" => $task_count
                      );
        
        /** The task box html is generated */
        $box_html   = Config::GetComponent("templateengine")->Generate("box", $params);
        
        return $box_html;
    }
    
    /**
     * It returns the number of pending tasks
     *
     * @return int $task_count the number of tasks that have status "In Progress"
     */
    private function GetPendingTaskCount() : int
    {
        /** The dbinit object is fetched */
        $dbinit          = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database        = $dbinit->GetDbManagerClassObj("Database");
		/** The table name */
        $table_name      = Config::$config['general']['mysql_table_names']['tasks'];
        
        /** The SQL query for fetching the website content */
        $sql             = "SELECT count(*) as total FROM `" . $table_name . "` WHERE status='In Progress'";
        /** The first row is fetched */
        $row             = $database->FirstRow($sql);
        
        $task_count      = (int) $row['total'];
        
        return $task_count;
    }
}
