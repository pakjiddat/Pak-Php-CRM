<?php

declare(strict_types=1);

namespace Crm\Ui\Parts;

use \Framework\Config\Config as Config;
use \Framework\Utilities\UtilitiesFramework as UtilitiesFramework;

/**
 * This class implements the IncomeBox component class
 * It is used to generate the income box component
 *
 * @category   Parts
 * @author     Nadir Latif <nadir@pakjiddat.pk>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2
 */
class IncomeBox
{
    /**
     * It provides the html for the income box
     *
     * @return string $box_html the box html
     */
    public function Generate() : string
    {
        /** The average income is returned */
        $income     = $this->GetAverageIncome();
        /** The parameters used to generate the income box */
        $params     = array(
                          "id" => "income-box",
                          "color" => "green",
                          "text" => "Monthly Income",
                          "link" => "#income",
                          "icon" => "fas fa-money-check-alt",
                          "value" => $income
                      );
        
        /** The income box html is generated */
        $box_html   = Config::GetComponent("templateengine")->Generate("box", $params);
        
        return $box_html;
    }
    
    /**
     * It returns the average monthly income
     *
     * @return string $average_income the formatted average monthly income
     */
    private function GetAverageIncome() : string
    {
        /** The dbinit object is fetched */
        $dbinit            = Config::GetComponent("dbinit");
        /** The Database class object is fetched */
        $database          = $dbinit->GetDbManagerClassObj("Database");
		/** The table name */
        $table_name        = Config::$config['general']['mysql_table_names']['income'];
        
        /** The SQL query for fetching the website content */
        $sql               = "SELECT amount,date FROM `" . $table_name . "` ORDER BY date ASC";
        /** All rows are fetched */
        $rows              = $database->AllRows($sql);
        /** The date for the first payment as unix timestamp */
        $first_income_date = strtotime($rows[0]['date']);
        /** The date for the last payment as unix timestamp */
        $last_income_date  = strtotime($rows[count($rows)-1]['date']);
        /** The number of months between the first and last payments */
        $month_count       = ceil(($last_income_date - $first_income_date)/(3600*24*30));
        /** The total income */
        $total_income      = 0;
        /** The total income is calculated */
        for ($count = 0; $count < count($rows); $count++) {
            /** The payment amount */
            $payment_amount  = str_replace("Rs ", "", $rows[$count]['amount']);
            /** The payment amount is formatted */
            $payment_amount  = str_replace(",", "", $payment_amount);
            /** The total income is updated */
            $total_income    += trim($payment_amount);
        }
        /** The average income */
        $average_income      = ceil($total_income/$month_count);
        /** The average income is formatted */
        $average_income      = "Rs " . number_format($average_income);
        
        return $average_income;
    }
}
