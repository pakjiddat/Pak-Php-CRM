<?php

declare(strict_types=1);

namespace Crm\Lib;

use \Framework\Config\Config as Config;

/**
 * This class provides functions related to Time Tracking
 *
 * @category   Library
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class TimeTracking
{
    /**
     * It calculates the total number of hours worked for the given task
     * 
     * @param int $task_id the task id
     *
     * @return float $time_taken the total number of hours spent on the task
     */
    public function GetHoursWorked(int $task_id) : float
    {
        /** The dbinit object is fetched */
        $dbinit          = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database        = $dbinit->GetDbManagerClassObj("Database");
		/** The table name */
        $table_name      = Config::$config['general']['mysql_table_names']['time_tracking'];
        
        /** The query parameters */
        $params          = array($task_id);
        /** The sql query for fetching data from database */
        $select_str      = "SELECT time_taken FROM `" . $table_name . "` WHERE task_id=?";
        /** The sql query is run */
        $rows            = $database->AllRows($select_str, $params);
        /** The total time taken for the task */
        $time_taken      = 0;
        /** Each table row is checked */
        for ($count = 0; $count < count($rows); $count++) {
            /** The time taken is formatted */
            list($hours, $minutes)        = explode(":", $rows[$count]['time_taken']);
            /** The leading 0 is removed from hours */
            $hours                        = (int) ltrim($hours, "0");
            /** The leading 0 is removed from minutes */
            $minutes                      = (int) ltrim(trim($minutes), "0");
            /** If hours is "", then it is set to 0 */
            if ($hours == "")
                $hours                    = 0;
            /** If minutes is "", then it is set to 0 */
            if ($minutes == "")
                $minutes                  = 0;
               
            /** If minutes is not 0 then it is calculated by dividing the number of minutes by 60 */
            $minutes                      = ($minutes/60);         	
            /** The total time taken */
            $time_taken                   +=  ($hours + $minutes);
        }
                
        return $time_taken;
    }        
}
